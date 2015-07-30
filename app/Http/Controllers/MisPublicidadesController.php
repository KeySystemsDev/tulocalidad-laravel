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
		$nombreArchivo 						= Input::get('namefile');
		$rutaOrigen    						= "uploads/temp/".$nombreArchivo;

		/*
		* 	Validaciones
		*/
		if (!file_exists($rutaOrigen)){
			$data 	 		= (object) ["titulo" => "Error (11121)"];
			$success 		= false;
			$msj 	 		= "No ha sido posible asignar la publicidad a su empresa, intentelo nuevamente y si el problema continua contacte al soporte tecnico a través del correo: soporte@tulocalidad.com.ve";
			$json 	 		= array('success'  => $success,
									  'mensaje' => $msj,
									  'data' 	=> $data);
			return json_encode($json);
		}

		if (substr(strtoupper($nombreArchivo), -3) == "JPG"){
			$imagen 		= imagecreatefromjpeg($rutaOrigen );			
		}else{
			$imagen 		= imagecreatefrompng( $rutaOrigen );
			$nombreArchivo  = substr($nombreArchivo, 0, -3)."jpg";
		};

		$lienzo_full 		= imagecreatetruecolor(700, 700);
		$lienzo_high 		= imagecreatetruecolor(362, 362);
		$lienzo_mid  		= imagecreatetruecolor(181, 181);
		$lienzo_low  		= imagecreatetruecolor(157, 157);

		imagecopyresampled($lienzo_full, $imagen, 0, 0, 0, 0, 700, 700, 700, 700);
		imagecopyresampled($lienzo_high, $imagen, 0, 0, 0, 0, 362, 362, 700, 700);
		imagecopyresampled($lienzo_mid,  $imagen, 0, 0, 0, 0, 181, 181, 700, 700);
		imagecopyresampled($lienzo_low,  $imagen, 0, 0, 0, 0, 157, 157, 700, 700);

		$rutabase 			= "uploads/"; 
		$ruta_imagen_full 	= $rutabase."publicidades_full/".$nombreArchivo;
		$ruta_imagen_high 	= $rutabase."publicidades_high/".$nombreArchivo;
		$ruta_imagen_mid  	= $rutabase."publicidades_mid/".$nombreArchivo;
		$ruta_imagen_low  	= $rutabase."publicidades_low/".$nombreArchivo;

		imagejpeg( $lienzo_full, $ruta_imagen_full , 90 );
		imagejpeg( $lienzo_high, $ruta_imagen_high , 90 );
		imagejpeg( $lienzo_mid,  $ruta_imagen_mid  , 90 );
		imagejpeg( $lienzo_low,  $ruta_imagen_low  , 90 );

		$publicidad                         = new Publicidad();
		$publicidad->id_empresa 			= Input::get("i_empresa");
		$publicidad->titulo_publicidad	 	= Input::get("i_titulo");
		$publicidad->descripcion_publicidad = Input::get("i_descripcion");
		$publicidad->url_imagen_publicidad  = $nombreArchivo;
		$publicidad->save();
		unlink($rutaOrigen);
	
		$data 	 		= "";
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
