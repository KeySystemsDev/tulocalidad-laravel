<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Response;
use Session;

class ImgController extends Controller {

	public function create(){
		$base64img = Input::get('img');
		$urlUpload = "uploads/temp/";
		$user = Session::get('usuario'); // -> aqui va el usuario logueado o el id del usuario


		$nameImg = $user.date("-d_n_Y-H:i:s");
		if (strpos($base64img,'png') !== true){
			$extension = ".png";
			$base64img = str_replace('data:image/png;base64,', '', $base64img);
		}else{
			$extension = ".jpg";
			$base64img = str_replace('data:image/jpg;base64,', '', $base64img);
		}

		$nameImg = $nameImg.$extension;
		$data = base64_decode($base64img);
		$url = $urlUpload.$nameImg;
		file_put_contents($url, $data);
		return Response::json(array('status'=>'success', 'name'=>$nameImg));
	}


	public function create_thumbnails($nombreArchivo, $prex_carpeta, $old_image=false){


		$rutaOrigen 		= "uploads/temp/".$nombreArchivo;
		$rutabase 			= "uploads/".$prex_carpeta; 
		$ruta_imagen_full 	= $rutabase."_full/";
		$ruta_imagen_high 	= $rutabase."_high/";
		$ruta_imagen_mid  	= $rutabase."_mid/";
		$ruta_imagen_low  	= $rutabase."_low/";

		/*
		* 	Validaciones
		*/
		if (!file_exists($rutaOrigen)){
			/*
			* 	COLOCAR LOG AQUI
			*	retorna error_code que será el id de seguimiento en la bitacora.
			*	
			*/
			$errorCode	= 0001;
			return array('success'=>false, 
						 'data' => array('error_code' => $errorCode),
						 );
		}
		if ($old_image){
			if (file_exists($ruta_imagen_full.$old_image)) {
				unlink($ruta_imagen_full.$old_image);
			}
			if (file_exists($ruta_imagen_high.$old_image)) {
			    unlink($ruta_imagen_high.$old_image);
			}
			if (file_exists($ruta_imagen_mid.$old_image)) {
			    unlink($ruta_imagen_mid.$old_image);
			}
			if (file_exists($ruta_imagen_low.$old_image)) {
			    unlink($ruta_imagen_low.$old_image);
			}
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

		imagejpeg( $lienzo_full, $ruta_imagen_full.$nombreArchivo , 90 );
		imagejpeg( $lienzo_high, $ruta_imagen_high.$nombreArchivo , 90 );
		imagejpeg( $lienzo_mid,  $ruta_imagen_mid.$nombreArchivo  , 90 );
		imagejpeg( $lienzo_low,  $ruta_imagen_low.$nombreArchivo  , 90 );
		unlink($rutaOrigen);

		/*
		* 	retorna el nombre del archivo con el .jpg incluido.
		*/
		return array('success'=>true, 
					 'data' => array('nombreArchivo' => $nombreArchivo),
					 );
	}
}
