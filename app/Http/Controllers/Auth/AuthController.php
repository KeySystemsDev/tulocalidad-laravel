<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Usuario;
use Redirect;
use App\Empresa;

class AuthController extends Controller {


	use AuthenticatesAndRegistersUsers;

	public function __construct(Guard $auth, Registrar $registrar){
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function CambiarPassword(){
		return view('auth/reset');
	}

	public function PostCambiarPassword(){
		
		return Redirect::to('/servicios');
	}


	public function CerrarSesion(){
		\Session::flush();
		return Redirect::to('/servicios');
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

	public function VerificarRif(){
		$data 		= array();
		$success 	= true;
		$mensaje 	= "";
		$repetidos 	= Empresa::where('rif_empresa', '=', \Input::get('rif'))->first(); 
		if ($repetidos){
			$success = false; 
			$mensaje = "Rif ya registrado, introduzca otro.";
		}

		$json = array('success' => $success,
					  'mensaje' => $mensaje,
					  'data' 	=> $data,
					  );
		return json_encode($json);
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

	public function HabilitarUsuario($id_usuario){
		Usuario::where('id_usuario','=', $id_usuario)->update(array('habilitado_usuario' => 1));
		return view('auth/habilitado');
	}
}
