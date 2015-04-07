<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
//use Input;

class RegistroController extends Controller {

	public function registro_empresa(){

	
	return View::make('Registro/Registro_empresa/formulario_empresa');   
}


	public function procesado_empresa(){
		$data =input::all();

	 return View::make('Registro/Registro_empresa/procesado', compact('data'));   
}
	public function registro_publicidad(){

	
	return View::make('Registro/Registro_publicidad/formulario_publicidad');   
}

	public function procesado_publicidad(){
		$data =input::all();

	 return View::make('Registro/Registro_publicidad/procesado',compact('data'));   
}
public function registro_usuario(){

	
	return View::make('Registro/Registro_usuario/formulario_usuario');   
}

	public function procesado_usuario(){
		$data =input::all();
		
	 return View::make('Registro/Registro_usuario/procesado',compact('data'));   
}
}

?>