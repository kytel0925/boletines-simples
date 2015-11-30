<?php


namespace App\Http\Controllers\Senders;


use App\Http\Controllers\Application;
use App\Models\Sender;
use Illuminate\Http\Request;
use Mail;

class Senders extends Application{
	public function getIndex(){
		$data = [
			'uuid' => time() . '-' . rand(10000, 20000)
		];

		return $this->getView('senders.index', $data);
	}

	public function postList(){
		return Sender::get();
	}

	public function postCreate(Request $request){
		$data = $request->only(['alias', 'username', 'password', 'host', 'maximum_per_day']);

		return Sender::create($data);
	}

	public function postSave(Request $request){
		/** @var Sender $sender */
		$sender = Sender::findOrFail($request->input('id'));
		$sender->fill($request->only(['alias', 'username', 'password', 'host', 'maximum_per_day']));
		$sender->save();

		return $sender;

	}

	public function getTest(){
		Sender::setConfiguration([
			'host' => 'smtp.gmail.com',
			'port' => 465,
			'address' => 'telmorafael.riofriot@gmail.com',
			'name' => 'Telmo Riofrio',
			'username' => 'telmorafael.riofriot',
			'password' => '1987@Rafa',
			'encryption' => ''
		]);

		return Mail::raw("Envio de un mensaje usando la interfaz de laravel y el cliente smtp de funiber", function ($message){
			$message->to('kytel0925@gmail.com', 'Telmo Riofrio');
			$message->subject('Correo usando la interfaz de laravel');

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
	}
}