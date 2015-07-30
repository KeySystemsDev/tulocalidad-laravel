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
		$email = \Input::get('email');
		$auth  = Usuario::where('correo_usuario', '=', $email)->first();
		$data  = \Input::get('email');
		if (count($auth)==0){

			$usuario = new Usuario;
			$usuario->correo_usuario   = \Input::get('email'); 	
			$usuario->clave_usuario    = \Input::get('password');
			$usuario->save();
			//ACOMODAR EL MENSAJE
			$mensaje ='
					<html>
						<head>
				 			<title>Bienvenido</title>
						</head>
						<body>
							<p align="center">
								<b>para activar su usuario haga click
								<a href="http://tulocalidad.com.ve/auth/activacion/'.$usuario->id_usuario.'">aquí.</b>
								<br><br>
							</p>
						</body>		
					</html>';

			$cabeceras  = '<b>MIME-Version: 1.0<br>' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1<br>' . "\r\n";
			$cabeceras .= "From: contacto@keysystems.com.ve";
			mail($email,"tulocalidad",$mensaje,$cabeceras); // ACOMODAR EL TITULO
			$msj 	 = 'Registro exitoso, revise su correo para activar su usuario.';
			$success = true;
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data
				);
		}else{
			$success = false;
			$msj 	 = 'El correo ya se encuentra registrado.';
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data
				);
		}
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
