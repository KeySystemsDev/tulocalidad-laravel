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
		$this->auth 	 = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getRegister(){
		$error =	'';
		return view('auth/register', compact('error'));
	}

	public function postRegister(){
		$email = \Input::get('email');
		$auth  = Usuario::where('correo_usuario', '=', $email)->first();
		

		if (count($auth)==0){

			$usuario = new Usuario;
			$usuario->correo_usuario   = \Input::get('email'); 	
			$usuario->clave_usuario    = \Input::get('password');
			$usuario->codigo_activacion_usuario= substr(md5(uniqid(rand(), true)), 16, 16);
			$usuario->save();
			//ACOMODAR EL MENSAJE
			$mensaje ='
					<html>
						<head>
				 			<title>Bienvenido '.$usuario->correo_usuario.' al directorio venezolano TU LOCALIDAD</title>
						</head>
						<body>
							<img width="20" src="'.\URL::to('img/tulocalidad.png').'">
							<p align="justify">
								<Para poder disfrutar de esta herramienta solo debes ingresar al siguiente enlace para activar su cuenta.</b>
								<b><a href="'.\URL::to('/auth/activacion/'.$usuario->codigo_activacion_usuario).'">Enlace de activación</a>.</b>
								<br>
								<b>Muchas gracias por su valioso tiempo.</b>
							</p>
						</body>		
					</html>';

			$cabeceras  = '<b>MIME-Version: 1.0<br>' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1<br>' . "\r\n";
			$cabeceras .= "From: no-responder@tulocalidad.com.ve";
			mail($email,"tulocalidad",$mensaje,$cabeceras); // ACOMODAR EL TITULO
			$msj 	 = 'Revise su correo para activar su usuario.';
			$data  	 = (object) ["titulo" => "Registro exitoso!",
								 "id_user" => $usuario->codigo_activacion_usuario,];
			$success = true;
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data
				);
		}else{
			$success = false;
			$data  	 = (object) ["titulo" => "Disculpe!"];
			$msj 	 = 'El correo ya se encuentra registrado.';
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data
				);
		}
		return json_encode($json);
	}

	public function getLogin(){
		$error 		 = "";
		$success 	 = "";
		if (\Session::get('id')){
			return Redirect::to('/servicios');
		}
		return view('/auth/login', compact('error','success'));
	}

	public function postLogin(){
		$data = "";
		$auth = Usuario::where('correo_usuario', '=', \Input::get('email'))->where('clave_usuario','=',(\Input::get('password')))->first();
        if(count($auth) == 0){
        	$data  	 = (object) ["titulo" => "Disculpe!"];
			$msj 	 = "Usuario o Contraseña son incorrectos";
			$success = false;
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data);
        }
        elseif($auth->habilitado_usuario == 0){
        	$data  	 = (object) ["titulo" => "Disculpe!"];
			$msj 	 = "Correo no verificado, revise su bandeja de entrada y siga las instrucciones enviadas.";
			$success = false;
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data);
        }else{
            \Session::put('usuario', $auth->correo_usuario);
            \Session::put('id', 	 $auth->id_usuario);
            $msj 	 = "logeado";
            $success = true;
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data);
        }
        return json_encode($json);
	}

	public function HabilitarUsuario($codigo_activacion){

		$mensaje = "Usuario Habilitado Satisfactoriamente";
		$codigo 	 =  1;
		$usuarios = Usuario::where('codigo_activacion_usuario', $codigo_activacion);

		if (!$usuarios){
			echo $codigo 	 =  -1;
			return view('auth/habilitado', compact('codigo'));
		}

		$usuario_habilitados = $usuarios->where('habilitado_usuario', 1);

		if ($usuario_habilitados->first()){
			echo $codigo	 = 2;
			return view('auth/habilitado', compact('codigo'));
		}

		Usuario::where('codigo_activacion_usuario','=', $codigo_activacion)->update(array('habilitado_usuario' => 1));
		return view('auth/habilitado', compact('codigo'));
	}
}
