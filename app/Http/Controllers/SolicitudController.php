<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Producto;
use App\Models\Estado;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\CategoriaProductos1;
use App\Models\Solicitud;
use Auth;
use Session;


class SolicitudController extends Controller{

    public function index($id_empresa){
        $solicitudes = Solicitud::all();
        return view('solicitudes.list',compact('solicitudes'));
    }

    public function crearSolicitud($id_empresa, Request $request){
        $request['id_empresa']=$id_empresa;
        $request['estatus_solitud']=1;
        Solicitud::create($request->all());
        return json_encode(['success'=>true,]);
    }
    
    public function responderSolicitud($id_empresa, $id_solicitud, Request $request){
        Solicitud::find($id_solicitud)->update([
                                        "texto_presupuesto_solicitud" => $request->texto_presupuesto_solicitud,
                                        "monto_presupuesto_solicitud" => $request->monto_presupuesto_solicitud,

                                        ]);

        return json_encode(['success'=>true,]);
    }

    public function aceptarSolicitud($id_empresa, $id_solicitud, Request $request){
        $request['id_empresa'] = $id_empresa;
        Solicitud::create($request->all());
        return json_encode(['success'=>true,]);
    }

    public function rechazarSolicitud($id_empresa, $id_solicitud, Request $request){
        $request['id_empresa'] = $id_empresa;
        Solicitud::create($request->all());
        return json_encode(['success'=>true,]);
    }



    public function destroy($id_empresa, $id){
        return redirect('/');
    }

}
