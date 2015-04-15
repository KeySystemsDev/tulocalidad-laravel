<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class RegistroController extends Controller {

	public function empresa_registro(){

	
	return View::make('registro/empresa_registro/empresa_formulario');   
	}


	public function empresa_procesado(){
		$data =input::all();

	 return View::make('registro/empresa_registro/procesado', compact('data'));   
	}
	public function publicidad_registro(){

	
	return View::make('registro/publicidad_registro/publicidad_formulario');   
	}

	public function publicidad_procesado(){
		$data =input::all();

	 return View::make('registro/publicidad_registro/procesado',compact('data'));   
	}
	public function usuario_registro(){

	
	return View::make('registro/usuario_registro/usuario_formulario');   
	}

	public function usuario_procesado(){
		$data =input::all();
		
	 return View::make('registro/usuario_registro/procesado',compact('data'));   
	}
}

?>