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
		if (!$request->has('password') || !$request->has('re-password')){
            Session::flash("mensaje-error",'rellene el password');
            return redirect("/registro");
        };

		if ($request->has('password') != $request->has('re-password')){
            Session::flash("mensaje-error",'las contraseñas no coinciden');
            return redirect("/registro");
        };        

        $verificacion = User::where('correo_usuario', $request->correo_usuario)->first();
        if ($verificacion){
            Session::flash("mensaje-error","usuario existente");
            return redirect("/registro");
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

	public function postForgetPassword(){
		return view('autenticacion.reset');
	}	
}
