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
		self::setConfiguration([
			'host' => $this->host,
			'port' => isset($this->port)? $this->port : 25,
			'address' => $from['address'],
			'name' => $from['name'],
			'username' => $this->username,
			'password' => $this->password
		]);

		$status = Mail::raw($mailMessage->getMessage(), function ($message) use ($mailMessage){
			$to = $mailMessage->getDestinatary();
			$message->to($to['email'], $to['name']);
			$message->subject($mailMessage->getSubject());

			//$message->from($address, $name = null);
			//$message->sender($address, $name = null);
			//$message->cc($address, $name = null);
			//$message->bcc($address, $name = null);
			//$message->replyTo($address, $name = null);
			//$message->priority($level);
			//$message->attach($pathToFile, array $options = []);
			// Attach a file from a raw $data string...
			//$message->attachData($data, $name, array $options = []);
			// Get the underlying SwiftMailer message instance...
			//$message->getSwiftMessage();
		});

		$status? $mailMessage->complete() : $mailMessage->failure();

		return $status;
	}
}