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
		return View::make('publicidad/index');   
	}

	public function Listar(){
		$id         = session('id');
		$count_items= 5;
		$current_page=1;
		$query = (array)\DB::select('CALL p_t_publicidad(?,?,?,?,?,?)',array('publicidad_por_usuario',$id,'','','',''));
		$mensaje 	= "";
		$empresas 	= \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_por_usuario','','',$id));

		if (count($empresas)==0){
			$mensaje 	= "No puede registrar publicidad hasta no tener al menos una empresa registrada.";
		}else{
			$mensaje 	= "No tiene publicidades registradas.";
		}

		if(\Input::has('page')){
			$current_page = \Input::get('page');
		}	
		
		$data 		= HelperController::Paginador($query, $count_items, $current_page);

		return View::make('publicidad/mis_publicidades',compact('data','mensaje'));   
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
		$nombreArchivo 	= Input::get('namefile');
		$nombre_carpeta = "publicidades";
		/*
		* 	Validaciones
		*/
		$imgController 	= new ImgController();
		$result			= $imgController->create_thumbnails($nombreArchivo, $nombre_carpeta);

		if (!$result['success']){
			$data 	 	= (object) ["titulo" => "Error (11121)"];
			$success 	= false;
			$msj 	 	= "No ha sido posible asignar la publicidad a su empresa, intentelo nuevamente y si el problema continua contacte a nuestro soporte a través del correo: soporte@tulocalidad.com.ve";
			$json 	 	= array('success'  => $success,
								  'mensaje' => $msj,
								  'data' 	=> $data);
			return json_encode($json);
		}
		
		$publicidad                         = new Publicidad();
		$publicidad->id_empresa 			= Input::get("i_empresa");
		$publicidad->titulo_publicidad	 	= Input::get("i_titulo");
		$publicidad->descripcion_publicidad = Input::get("i_descripcion");
		$publicidad->url_imagen_publicidad  = $result['data']['nombreArchivo'];
		$publicidad->save();

		$data 	 		= (object) ["titulo" => "Registro exitoso!"];
		$success 		= true;
		$msj 	 		= "Su publicidad ha sido creada exitosamente.";
		$json 	 		= array('success'   => $success,
								  'mensaje' => $msj,
								  'data' 	=> $data);
		return json_encode($json);
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
