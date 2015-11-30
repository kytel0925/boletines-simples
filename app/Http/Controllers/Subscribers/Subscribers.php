<?php


namespace App\Http\Controllers\Subscribers;


use App\Http\Controllers\Application;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class Subscribers extends Application{
	public function getIndex(){
		$data = [
			'uuid' => time() . '-' . rand(10000, 20000)
		];

		return $this->getView('subscribers.index', $data);
	}

	public function postList(Request $request){
		$data = Subscriber::paginate($request->input('rows'));
		return [
			'total' => $data->total(),
			'rows' => $data->items()
		];
	}

	public function postCreate(Request $request){
		$data = $request->only(['name', 'email']);

		return Subscriber::create($data);
	}

	public function postSave(Request $request){
		$mailing = Subscriber::findOrFail($request->input('id'));
		$mailing->name = $request->input('name');
		$mailing->email = $request->input('email');
		$mailing->save();

		return $mailing;

	}
}