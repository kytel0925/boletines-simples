<?php


namespace App\Http\Controllers\Mailings;


use App\Http\Controllers\Application;
use App\Models\Mailing;
use Illuminate\Http\Request;

class Mailings extends Application{
	public function getIndex(){
		$data = [
			'uuid' => time() . '-' . rand(10000, 20000)
		];

		return $this->getView('mailings.index', $data);
	}

	public function postList(){
		return Mailing::get();
	}

	public function postCreate(Request $request){
		$data = $request->only(['subject', 'body']);
		$data['code'] = Mailing::generateCode();
		$data['created_by'] = $request->user()->id;

		return Mailing::create($data);
	}

	public function postSave(Request $request){
		$mailing = Mailing::findOrFail($request->input('id'));
		$mailing->subject = $request->input('subject');
		$mailing->body = $request->input('body');
		$mailing->save();

		return $mailing;

	}
}