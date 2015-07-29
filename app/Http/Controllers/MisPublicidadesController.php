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
		$publicidad = (array)\DB::select('CALL p_t_publicidad(?,?,?,?,?,?)',array('publicidad_por_usuario',$id,'','','',''));
		$mensaje 	= "";
		$empresas 	= \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_por_usuario','','',$id));

		if (count($empresas)==0){
			$mensaje 	= "No puede registrar publicidad hasta no tener al menos una empresa registrada.";
		}else{
			$mensaje 	= "No tiene publicidades registradas.";
		}
		return View::make('publicidad/mis_publicidades',compact('publicidad','mensaje'));   
	}

	public function AgregarPublicidad($id_seleccion=0){
		$id       = session('id');
		$empresas = \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_por_usuario','','',$id));
		if (count($empresas)==0){
			return \Redirect::to('mis-publicidades/');
		}
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
		rename($rutaOrigen,$rutaDestino);
		return View::make('publicidad/agregar_publicidad_exitoso');
	}

	public function EditarPublicidad($id_publicidad){
		return View::make('publicidad/editar_publicidad', compact('id_publicidad'));   
	}	

	public function BorrarPublicidad($id){
		Empresa::destroy($id);
		return \Redirect::to('mis-empresas/');
	}

	public function DeshabilitarPublicidad($id){

		// Publicidad::where('id_publicidad','=', $id)->delete();
		Publicidad::where('id_publicidad','=', $id)->update(
			array(
				'habilitado_publicidad' => 0,
			)
		);

		return \Redirect::to('mis-publicidades/');
	}

}
