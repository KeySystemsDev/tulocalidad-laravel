<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Usuario;

class AuthController extends Controller {


	use AuthenticatesAndRegistersUsers;

	public function __construct(Guard $auth, Registrar $registrar){
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getRegister(){
		return view('auth/register');
	}

	public function postRegister(){
		$usuario = new Usuario;
		$usuario->correo_usuario   = \Input::get('email'); 	
		$usuario->clave_usuario    = \Input::get('password');
		$usuario->save();
		return \Redirect::to('auth/login');
	}

	public function getLogin(){
		return view('auth/login');
	}

	public function postLogin(){
		$auth = Usuario::where('correo_usuario', '=', \Input::get('email'))->where('clave_usuario','=',(\Input::get('password')))->pluck('correo_usuario');
       	//print($auth);
        if(count($auth) == 0){
        	return \Redirect::to('auth/login');
        }
        else
        {
            \Session::put('usuario', '$auth');
            return \Redirect::to('empresa');
        }
	}

}
