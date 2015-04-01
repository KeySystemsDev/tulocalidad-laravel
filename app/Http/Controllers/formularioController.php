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
		print_r($data);
		/*echo $data[$nombre];
		echo $data[$rif];
		echo $data[$direccion];
		echo $data[$categoria];
		echo $data[$estados];
		echo $data[$telefono];
		echo $data[$telefono2];
		echo $data[$telefono3];
		echo $data[$celular];*/

	 return View::make('recibir',$data);   
}
}

?>