<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Usuario;
use App\Reset_Clave;
class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}

	public function getEmail()
	{
		return view('auth.password');
	}

	/**
	 * Send a reset link to the given user.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function postEmail(){
		$email = Usuario::where('correo_usuario', '=',\Input::get('email'))->pluck('correo_usuario');
		if (strtolower($email)==strtolower(\Input::get('email'))){
			$pass= new Reset_Clave;
			$password = $pass->NuevaPass(10);
			Usuario::where('correo_usuario', '=',\Input::get('email'))->update(
				array(
					'clave_usuario'                =>$password,
				)
			);
			$mensaje ='<html>
		<head>
 			<title>Nueva clase de Ingreso</title>
		</head>
		<body>
 			<p>Hola Sr(a) <b>'.$email.'</b>, le hemos enviado su nueva contrase&ntilde;a temporal para que pueda ingresar al sistema, de igual forma le informamos que podra cambiarla en el momento que Ud. lo desee.
					</p>
					<p align="center">
						<b>Nueva Contrase&ntilde;a:'.$password.'</b>
						<br><br>
						<a href="http://tulocalidad.com.ve/auth/login" type="button" class="btn btn-info">Iniciar.</p>
		</body>
		</html>';

		$cabeceras  = '<b>MIME-Version: 1.0<br>' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1<br>' . "\r\n";
		$cabeceras .= "From: contacto@keysystems.com.ve";
		
		mail($email,"Nueva clave de Acceso",$mensaje,$cabeceras);
		return view('auth/pass_enviada');
		}
		else{
			return print "El correo ingresado no existe en la base de datos";
		}
		
	}
}
