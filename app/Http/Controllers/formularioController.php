<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use App\ModelApp\Empresa;
use Illuminate\Http\Request;
//use Input;

class formularioController extends Controller {

	public function index(){


	 return View::make('formulario');   
}


	public function registro(){
		$data = input::all();
		$direccion = Input::get('direccion');
		echo $direccion;
		/*$data = input::direccion
		print_r($data);*/


	 //return View::make('recibir',compact('data'));   
}

	public function conectar(){
		/*$empresa = new Empresa;
		$resultado = $empresa -> empresa_consulta();
		print_r($resultado);*/
		$empresa = Empresa::empresa_consulta()->get();
}
	}

?>