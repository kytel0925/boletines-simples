<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Models\ListMailing;
use App\Models\ListMember;
use App\Models\Mailing;
use app\Models\MailMessage;
use App\Models\Sender;
use App\Models\Subscriber;
use App\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

/**
 * Envia el correo a la lista de suscriptores
 *
 * Class SendBulkMailings
 * @package App\Jobs
 */
class SendBulkMailings extends Job implements SelfHandling, ShouldQueue{
    use InteractsWithQueue, SerializesModels;

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @var Mailing
	 */
	protected $mailing;

	protected $senders;
	protected $sender;

    public function __construct(User $user, Mailing $mailing){
        $this->user = $user;
	    $this->mailing = $mailing;
	    $this->senders = Sender::all();

    }

    public function handle(Mailer $mailer){
		!$this->mailing->hasListOfMailings() && $this->createList();
	    /** @var ListMailing $list */
		$list = $this->mailing->listMailings()->first();
	    $list->isPending() && $this->fireNastySpam($list, $mailer);

	    !$this->mailing->isFinish() && $this->release(300);

	    $this->delete();
    }

	private function createList(){
		DB::transaction(function(){
			$this->mailing->status = 'working';
			$this->mailing->save();

			/** @var ListMailing $list */
			$list = ListMailing::forceCreate([
				'mailing_id' => $this->mailing->id,
				'name' => 'some auto name',
				'status' => 'pending'
			]);

			Subscriber::where('status', 'active')->get()->each(function(Subscriber $subscriber) use($list){
				ListMember::forceCreate([
					'list_id' => $list->id,
					'subscriber_id' => $subscriber->id
				]);
			});
		});
	}

	private function fireNastySpam(ListMailing $listMailing, Mailer $mailer){
		$listMailing->listMembers()->where('status', 'pending')->get()->each(function(ListMember $listMember){
			!($sender = $this->getSender()) && $this->release(300);

			$sender->send(new SpamMessage($listMember, $this->mailing));
			$listMember->status = 'done';
			$listMember->save();
		});

		$listMailing->status = 'finish';
		$listMailing->save();
		$this->mailing->status = 'finish';
		$this->mailing->save();
	}

	/**
	 * @return Sender
	 */
	private function getSender(){
		foreach($this->senders['data'] as $index => $sender){
			/** @var Sender $sender */
			$sender->checkStatus();
			if($sender->isEnabled() && !in_array($index, $this->senders['selected'])){
				array_push($this->senders['selected'], $index);

				return $sender;
			}
		}

		$this->senders['selected'] = [];
		return $this->getSender();
	}
}


class SpamMessage implements MailMessage{
	protected $listMember;
	protected $mailer;

	public function __construct(ListMember $listMember, Mailing $mailer){
		$this->listMember = $listMember;
		$this->mailer = $mailer;
	}

	public function getFrom(){
		return [
			'name' => $this->mailer->from_name,
			'email' => $this->mailer->from_mail
		];
	}

	public function getMessage(){
		return $this->mailer->body;
	}

	public function getDestinatary(){
		return [
			'name' => $this->listMember->subscriber->name,
			'email' => $this->listMember->subscriber->email
		];
	}

	public function getSubject(){
		return $this->mailer->subject;
	}

	public function complete(){

	}

	public function failure(){
		// TODO: Implement failure() method.
	}
}