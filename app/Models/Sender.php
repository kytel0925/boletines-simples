<?php


namespace App\Models;

use Mail;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Sender extends Model implements AuthorizableContract{
	use Authorizable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sender';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['alias', 'username', 'password', 'host', 'maximum_per_day'];
	protected $sends = [];

	public static function setConfiguration(array $options){
		config([
			'mail.host' => $options['host'],
			'mail.port' => $options['port'],
			'mail.from' => [
				'address' => $options['address'],
				'name' => $options['name']
			],
			'mail.username' => $options['username'],
			'mail.password' => $options['password'],
			'mail.encryption' => $options['encryption']
		]);
	}

	public function send(MailMessage $mailMessage){
		$from = $mailMessage->getFrom();
		config([
			'mail.host' => $this->host,
			'mail.username' => $this->username,
			'mail.password' => $this->password,
			'mail.port' => $this->port,
			'mail.encryption' => $this->protocol,
			'mail.from' => [
				'address' => $from['email'],
				'name' => $from['name']
			]
		]);

		$attempt = SenderAttempt::forceCreate([
			'sender_id' => $this->id,
			'list_member_id' => $mailMessage->id,
			'status' => 'pendding'
		]);

		$status = Mail::raw($mailMessage->getMessage(), function ($message) use ($mailMessage){
			$to = $mailMessage->getDestinatary();
			$message->to($to['email'], $to['name']);
			$message->subject($mailMessage->getSubject());
			$message->setBody($mailMessage->getMessage(), 'text/html');

			//$message->from('telmo.riofrio@funiber.org', 'Telmo Riofrio');
			//$message->sender('telmo.riofrio@funiber.org', 'Telmo Riofrio');
			//$message->cc($address, $name = null);
			//$message->bcc($address, $name = null);
			$message->replyTo('telmo.riofrio@funiber.org', 'Telmo Riofrio replicar');
			//$message->priority($level);
			//$message->attach($pathToFile, array $options = []);
			// Attach a file from a raw $data string...
			//$message->attachData($data, $name, array $options = []);
			// Get the underlying SwiftMailer message instance...
			//$message->getSwiftMessage();
		});

		$status? $mailMessage->complete() : $mailMessage->failure();
		$attempt->status = 'ok';
		$attempt->save();

		return $status;
	}

	public function isEnabled(){
		return $this->status == 'ready';
	}

	public function checkStatus(){
		$intentos_en_esta_hora = $this->attempts()->whereBetween('created_at', [date('Y-m-d H:00:00'), date('Y-m-d H:59:59')])->count();
		$this->status = ($intentos_en_esta_hora >= $this->max_per_hour)? 'busy' : 'ready';
		$this->save();
	}

	public function attempts(){
		return $this->hasMany('App\Models\SenderAttempt', 'sender_id');
	}
}