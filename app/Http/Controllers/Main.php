<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Auth;

class Main extends Controller{
	/**
	 * @var Request
	 */
	protected $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function index(){
		if(!Auth::check()){
			$auth = new AuthController();

			return $auth->getLogin();
		}

		return "Estar autenticado";
	}
}