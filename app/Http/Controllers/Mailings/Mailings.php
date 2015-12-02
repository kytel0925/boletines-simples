<?php


namespace App\Http\Controllers\Mailings;

use DB;
use App\Http\Controllers\Application;
use App\Jobs\SendBulkMailings;
use App\Models\Mailing;
use App\User;
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
		$data = $request->only(['subject', 'body', 'from_name', 'from_mail']);
		$data['status'] = 'pending';
		$data['code'] = Mailing::generateCode();
		$data['created_by'] = $request->user()->id;

		$mailing = Mailing::forceCreate($data);
		//$this->fireBuildMailings($request->user(), $mailing);
		return $mailing;
	}

	public function postSave(Request $request){
		$mailing = Mailing::findOrFail($request->input('id'));
		$mailing->subject = $request->input('subject');
		$mailing->body = $request->input('body');
		$mailing->from_name = $request->input('from_name');
		$mailing->from_mail = $request->input('from_mail');
		$mailing->save();

		return $mailing;
	}

	public function anyFire(Request $request, $id){
		$mailings = Mailing::findOrFail($id);
		$this->fireBuildMailings($request->user(), $mailings);

		return $mailings;
	}

	private function fireBuildMailings(User $user, Mailing $mailing){
		return $this->dispatch(new SendBulkMailings($user, $mailing));
	}

	public function getCheck(){
		DB::enableQueryLog();
		$st =  Mailing::first()->createdBy()->whereBetween('created_at', [date('Y-m-d H:00:00'), date('Y-m-d H:59:59')])->count();
		return DB::getQueryLog();
	}
}