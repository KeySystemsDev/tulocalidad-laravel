<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;
use DB;
use Redirect;
use Session;
use App\Publicidad;
use Request;

class MisPublicidadesController extends Controller {

	public function Index(){
		return View::make('publicidad/mis_publicidades');   
	}

	public function AgregarPublicidad(){
		return View::make('publicidad/agregar_publicidad');   
	}

	public function EditarPublicidad($id_publicidad){
		return View::make('publicidad/editar_publicidad', compact('id_publicidad'));   
	}	
}
