<?php namespace App\Http\Controllers\Movil;
header('Access-Control-Allow-Origin: *');
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Publicidad;


class UtilsController extends Controller {

    public function GetVersion(){
        $version        = explode("." ,\Input::get("version"));
        $descargar      = false;
        $success        = true;
        $msj            = "";
        if (count($version)!=3){
            $success    = false;
            $msj        = "formato invalido";
            $consulta   = array('success'  => $success,
                                'mensaje'  => $msj,
                                'consulta' => $descargar);
            return json_encode($consulta);
        }
        $version_mayor      = $version[0];
        $version_media      = $version[1];
        $version_menor      = $version[2];

        $meta_version       = explode(".", DB::table('t_tipo')
                                            ->where('id_maestro', 2)
                                            ->first()
                                            ->nombre_tipo);
        $data_version_mayor = $meta_version[0];
        $data_version_media = $meta_version[1];
        $data_version_menor = $meta_version[2];


        if ($version_mayor < $data_version_mayor){
            $descargar      = true;
        };


        $consulta           = array('success'  => $success,
                                    'mensaje'  => $msj,
                                    'consulta' => $descargar);
        return json_encode($consulta);
    }

}
?>