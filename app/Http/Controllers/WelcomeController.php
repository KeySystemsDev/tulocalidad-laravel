<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function index(){	
		return view('welcome/welcome');
	}

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function theme(){	
		return view('theme/theme');
	}

}
