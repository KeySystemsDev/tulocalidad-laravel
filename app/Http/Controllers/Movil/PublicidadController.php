<?php namespace App\Http\Controllers\Movil;
header('Access-Control-Allow-Origin: *');
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Publicidad;


class PublicidadController extends Controller {

    public function ActionPublicidad(){
        $consulta = \DB::select('CALL p_t_publicidad(?,?,?,?,?,?)',array('listado_publicidades','','','','',''));
        echo json_encode($consulta);
    }

    public function DetallePublicidad(){
  //   	$success 			= true;
		// $msj 	 			= "consulta exitosa.";

    	$id_publicidad 		= \Input::get("id_publicidad");
    	$detalle_publicidad = Publicidad::where("id_publicidad", $id_publicidad)->get();

  //   	if (!$detalle_publicidad || $detalle_publicidad->habilitado_publicidad == 0){
  //   		$success 		= false;
  //   		$msj 			= "Publicidad no existe o fue eliminada.";
  //   	}

		// $json 	 			= array('success'    => $success,
		// 							  'mensaje'  => $msj,
		// 							  'consulta' => $detalle_publicidad);
		return json_encode($detalle_publicidad);		
	 	

    }
}
?>