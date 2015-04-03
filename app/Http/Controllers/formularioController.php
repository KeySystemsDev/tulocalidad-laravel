<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
//use Input;

class formularioController extends Controller {

	public function index(){


	 return View::make('formulario');   
}


	public function registro(){
		$data =input::all();

	 return View::make('recibir',compact('data'));   
}
}

?>