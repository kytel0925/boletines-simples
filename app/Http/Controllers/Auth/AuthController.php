<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\System\Views;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Overrides the views templates folder by default is the class name in lowercase
	 *
	 * @var string
	 */
	protected $viewsFolder = 'auth';

	/**
	 * Gets the redirection when an authentication perform
	 *
	 * @var string
	 */
	protected $redirectPath = 'dashboard';

    /**
     * Create a new authentication controller instance.
     */
    public function __construct(){
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

	public function getLogin(){
		return view('startbootstrap-sb-admin.auth.login.index');
	}

	protected function authenticated(Request $request, User $user){


		return redirect()->intended($this->redirectPath());
	}
}
