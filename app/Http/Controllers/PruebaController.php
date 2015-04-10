<?php namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Eloquent;
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


	 return View::make('recibir',compact('data'));   
	}

	public function conectar(){
		$empresa = Empresa::empresa_consulta()->get();
	}
	
	public function postFilters(){
		$m_empresa = NEW Empresa; 
   		$filt = Input::get('direccion');
   		$query = Empresa::getFilters($filt);
   		return View::make('empresa.empresa_consulta', ['Empresa'=>$query]);
 	} 
 /*	public function action_index()
	{
		$users = User::all();
		return View::make('user.index')->with('users', $users);
	}*/
}

?>