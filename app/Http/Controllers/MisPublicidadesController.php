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
		$id         = session('id');
		$publicidad = \DB::select('CALL p_t_publicidad(?,?,?)',array('publicidad_por_usuario',$id,''));
		//print_r($publicidad);
		return View::make('publicidad/mis_publicidades',compact('publicidad'));   
	}

	public function AgregarPublicidad($id_seleccion=0){
		$id       = session('id');
		$empresas = \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_por_usuario','','',$id));
		//print_r($empresas);
		//echo $id_seleccion;
		return View::make('publicidad/agregar_publicidad', compact('empresas','id_seleccion'));
	}

	public function AgregarPublicidadExitoso(){
		$publicidad                         = new Publicidad();
		$nombreArchivo 						= e(Input::get('namefile'));
		$rutaOrigen    						= "uploads/temp/".$nombreArchivo;
		$rutaDestino 					    = "uploads/publicidades/".$nombreArchivo;
		$publicidad->id_empresa 			= Input::get("i_empresa");
		$publicidad->titulo_publicidad	 	= Input::get("i_titulo");
		$publicidad->descripcion_publicidad = Input::get("i_descripcion");
		$publicidad->url_imagen_publicidad  = "/".$rutaDestino;
		$publicidad->save();
		//rename($rutaOrigen,$rutaDestino);
		return View::make('publicidad/agregar_publicidad_exitoso');
	}

	public function EditarPublicidad($id_publicidad){
		return View::make('publicidad/editar_publicidad', compact('id_publicidad'));   
	}	

	public function BorrarPublicidad($id){
		Empresa::destroy($id);
		return \Redirect::to('mis-empresas/');
	}
}
