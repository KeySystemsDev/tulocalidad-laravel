<?php 
use View;

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
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(){

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(){
		$a = 'Me cagp en la madre';
		return View::make('welcome', compact('a'));
	}

	public function prueba(){
		$a = 'Vista 2';
		return View::make('prueba', compact('a'));
	}

}
