<?php


namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Application;
use Illuminate\Http\Request;

class Dashboard extends Application{
	public function getIndex(Request $request){
		$data = [
			'request' => $request
		];

		return $this->getView('dashboard.index', $data);
	}

	public function getDash(Request $request){
		return $this->getView('dashboard.dash');
	}
}