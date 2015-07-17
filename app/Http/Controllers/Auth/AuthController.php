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
		$error =	'';
		return view('auth/register', compact('error'));
	}

	public function postRegister(){
		$auth = Usuario::where('correo_usuario', '=', \Input::get('email'))->first();
		if (count($auth)==0){

			$usuario = new Usuario;
			$usuario->correo_usuario   = \Input::get('email'); 	
			$usuario->clave_usuario    = \Input::get('password');
			$usuario->save();
			$error 	 = '';
			$success = "Usuario creado exitosamente.";
			return view('auth/login', compact('error','success'));
		}else{
			$success 	= '';
			$error 		= 'El correo ya se encuentra registrado.';
			return view('auth/register', compact('error'));
		}
	}

	public function getLogin(){
		$error 		= "";
		$success 	= "";
		return view('auth/login', compact('error','success'));
	}

	public function postLogin(){
		$auth = Usuario::where('correo_usuario', '=', \Input::get('email'))->where('clave_usuario','=',(\Input::get('password')))->first();
        if(count($auth) == 0){
			$error 		= "Usuario o clave incorrecto";
			$success 	= '';
        	return view('auth/login', compact('error','success'));
        }
        else
        {
            \Session::put('usuario', $auth->correo_usuario);
            \Session::put('id', $auth->id_usuario);
            return \Redirect::to('mis-empresas');
        }
	}
}
