<?php


namespace App\Http\Controllers\Senders;


use App\Http\Controllers\Application;
use App\Models\Sender;
use Illuminate\Http\Request;

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
		$data = $request->only(['name', 'email']);

		return Sender::create($data);
	}

	public function postSave(Request $request){
		$sender = Sender::findOrFail($request->input('id'));

		return $sender;

	}
}