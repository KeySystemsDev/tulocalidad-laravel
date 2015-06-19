<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Redirect;
use App\Usuario;

class LoginController extends Controller {

	public function CerrarSesion(){
		\Session::flush();
		return Redirect::to('auth/login');
	}

}
