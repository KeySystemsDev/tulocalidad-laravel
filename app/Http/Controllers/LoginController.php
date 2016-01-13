<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Redirect;
use App\User;
use App\Perfil;
use Illuminate\Http\Request;

class LoginController extends Controller {


	public function login(){
		return view('autenticacion.login');
	}


	public function postLogin(LoginRequest $request){

	    $user = array(
	        'correo_usuario' => \Input::get('correo_usuario'),
	        'password' => \Input::get('clave_usuario')
	    );

		if (Auth::attempt($user)){
			return redirect("/");
			//return redirect()->back();
		}
		Session::flash('mensaje-error', 'Credenciales incorrectas, intentalo de nuevo.');
		return redirect("/login");
		//return $request->correo_usuario;
	}

	public function logout(){
		Auth::logout();
		return Redirect('/login');
	}

	public function registro(){
		return view('autenticacion.registro');
	}

	public function postRegistro(Request $request){
		//dd($request->has('password'));
		if (!$request->has('password') || !$request->has('re_password')){
            Session::flash("mensaje-error",'rellene el password');
            return redirect("/registro");
        };

		if ($request->password != $request->re_password){
            Session::flash("mensaje-error",'las contraseña no coinciden');
            return redirect("/registrar");
        };        

        $verificacion = User::where('correo_usuario', $request->correo_usuario)->first();
        if ($verificacion){
            Session::flash("mensaje-error","usuario existente");
            return redirect("/registrar");
        };

        $request['password'] = \Hash::make($request['password']);
        $user = User::create($request->all());

        Session::flash("mensaje","usuario registrado exitosamente");
        return redirect('/login');
	}

	public function resetPassword(){
		return view('autenticacion.reset');
	}

	public function postResetPassword(Request $request){
		if ( $request->get('password') != $request->get('password_confirmation') ){
			Session::flash("mensaje-error","Contraseñas no coinciden");
			return redirect()->back();
		}
		$credentials = [
		    'correo_usuario' =>$user = Auth::user()->correo_usuario,
		    'password' => $request->get('old-password'),
		];

		if(\Auth::validate($credentials)) {

		    $user = Auth::user();
		    $user->password = \Hash::make($request['password']);
		    $user->save();
		    Auth::logout();
			Session::flash("mensaje","Cambio de contraseña exitoso, favor loguearse nuevamente");
			return redirect('/login');
		}
		Session::flash("mensaje-error","Contraseña incorrecta incorrectas");

		return redirect()->back();
	}

	public function forgetPassword(){
		return view('autenticacion.password');
	}

	public function postForgetPassword(Request $request){
		if($request->correo){
			$user = User::where('correo_usuario', $request->correo)->first();
			if(!$user){
				Session::flash('mensaje-error','Correo no existente.');
				return redirect('/recuperar-contraseña');
			}			
			//$perfil = Perfil::where('id_usuario', $user->id_usuario)->first();
			$password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
			
			$asunto = "Reestablecer contraseña";
			$plantilla = 'emails.forgot_password';
			$parametros = [
			//			'nombre' => $perfil->fullName(),
						'nombre' => '',
						'password' => $password,
						'contacto_email' => env('CONTACT_EMAIL'),
			];

			Helper::SendEmail($request->correo, $request->correo, $asunto, $plantilla, $parametros);

			$user->password = \Hash::make($password);
			$user->save();
		}else{
			Session::flash('mensaje-error','Introduzca un correo');
			return redirect('/recuperar-contraseña');
		};
		Session::flash('mensaje','Su nueva contraseña a sido enviada a su correo.');
		return redirect('/login');
	}
}
