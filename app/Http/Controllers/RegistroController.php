<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
//use Input;

class RegistroController extends Controller {

	public function registro_empresa(){

	
	return View::make('Registro/Registro_empresa/f_empresa');   
}


	public function procesado_empresa(){
		$data =input::all();
		/*echo $data[$nombre];
		echo $data[$rif];
		echo $data[$direccion];
		echo $data[$categoria];
		echo $data[$estados];
		echo $data[$telefono];
		echo $data[$telefono2];
		echo $data[$telefono3];
		echo $data[$celular];*/

	 return View::make('Registro/Registro_empresa/procesado', compact('data'));   
}
	public function registro_publicidad(){

	
	return View::make('Registro/Registro_publicidad/f_publicidad');   
}


	public function procesado_publicidad(){
		$data =input::all();
		/*echo $data[$nombre];
		echo $data[$rif];
		echo $data[$direccion];
		echo $data[$categoria];
		echo $data[$estados];
		echo $data[$telefono];
		echo $data[$telefono2];
		echo $data[$telefono3];
		echo $data[$celular];*/

	 return View::make('Registro/Registro_publicidad/procesado',compact('data'));   
}
public function registro_usuario(){

	
	return View::make('Registro/Registro_usuario/f_usuario');   
}


	public function procesado_usuario(){
		$data =input::all();
		/*echo $data[$nombre];
		echo $data[$rif];
		echo $data[$direccion];
		echo $data[$categoria];
		echo $data[$estados];
		echo $data[$telefono];
		echo $data[$telefono2];
		echo $data[$telefono3];
		echo $data[$celular];*/

	 return View::make('Registro/Registro_usuario/procesado',compact('data'));   
}
}

?>