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
use MP;

class SolicitudController extends Controller{


    public function __construct(){
        //$this->beforeFilter('@permisos');
        $this->beforeFilter('@find', ['only' => ['index',
                                                 ]]);
    }

    public function find(Route $route){
        $this->empresa = Empresa::where('id_usuario',Auth::user()->id_usuario)
                                ->where('id_empresa',$route->getParameter('empresas'))
                                ->first();
        if (!$this->empresa){
            //Session::flash("mensaje-error","No existe ese registro.");
            return redirect('/empresas');
        }
    }

    public function index($id_empresa){
        $solicitudes = Solicitud::all() ;
        return view('solicitudes.list', ['solicitudes'=>$solicitudes, 
                                            'id_empresa'=>$this->empresa->id_empresa,
                                            'nombre_empresa'=>$this->empresa->nombre_empresa]);
    }

    public function crearSolicitud($id_empresa, Request $request){
        $request['id_empresa']=$id_empresa;
        $request['id_comprador']=Auth::user()->id_usuario;
        $request['estatus_solicitud']=1;
        Solicitud::create($request->all());
        return json_encode(['success'=>true,]);
    }
    
    public function responderSolicitud($id_empresa, $id_solicitud, Request $request){
        Solicitud::find($id_solicitud)->update([
                                        "texto_presupuesto_solicitud" => $request->texto_presupuesto_solicitud,
                                        "monto_final_solicitud" => $request->monto_presupuesto_solicitud,
                                        "fecha_vencimiento_solicitud" => $request->fecha_vencimiento_solicitud,
                                        'estatus_solicitud'             => 2,
                                        ]);

        return json_encode(['success'=>true,]);
    }

    public function aceptarSolicitud($id_empresa, $id_solicitud, Request $request){
        $solicitud = Solicitud::find($id_solicitud);
        /*
        if (\Carbon\Carbon::now() < $solicitud->fecha_vencimiento_solicitud ){
            $solicitud->update([
                            'estatus_solicitud'             =>5,
                            'fecha_finalizado_solicitud'    => \Carbon\Carbon::now(),
                            ]);
            return json_encode(['success'=>false, 'msj'=>'solicitud vencida']);
        };
        */

        $empresa = Empresa::find($id_empresa);
        $solicitud = Solicitud::find($request->id_solicitud);
        $fields = array(
            'client_id' => env('MP_APP_ID', ''),
            'client_secret' => env('MP_APP_SECRET', ''),
            'grant_type' => 'refresh_token',
            'refresh_token' => $empresa->refresh_token_mercadopago,
        );
        $fields_string="";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, 'https://api.mercadolibre.com/oauth/token');
        curl_setopt($curl, CURLOPT_HTTPHEADER , ['content-type: application/x-www-form-urlencoded', 'accept: application/json']);
        curl_setopt($curl, CURLOPT_POST , true);
        curl_setopt($curl, CURLOPT_POSTFIELDS , $fields_string);
        $response =  json_decode(curl_exec($curl)); 
        curl_close($curl);
        $empresa->update(['refresh_token_mercadopago'=>$response->refresh_token,
                                'access_token_mercadopago'=>$response->access_token,
                                'user_id_mercadopago'=>$response->user_id,
                                'fecha_vencimiento_mercadopago'=>$response->expires_in,
                                ]);
        $empresa->save();
        $mp = new MP($response->access_token);
        $mp->sandbox_mode(TRUE);

/*        $articulos = Carrito::where('id_empresa',$request->id_empresa)
                            ->where('id_usuario', Auth::user()->id_usuario)
                            ->get();
  */      
        $preference_data=[  
                            'items'=>[
                                'title' => $solicitud->servicio->nombre_servicio,
                                'quantity' =>intval('1'),
                                'description' => $solicitud->servicio->descripcion_servicio,
                                'picture_url' =>$solicitud->servicio->url_imagen_servicio,
                                'currency_id'=> 'VEF',
                                'unit_price'=> (float) $solicitud->monto_final_solicitud,
                            ],
                            'back_urls'=>[
                                'success'=>url('contratar/mercadopago/respuesta/'),
                                'pending'=>url('contratar/mercadopago/respuesta/'),
                                'failure'=>url('contratar/mercadopago/respuesta/'),
                            ],
                            'payer'=>[
                                'email'=>Auth::user()->correo_usuario,

                            ],
                            'external_reference'=>Auth::user()->id_usuario.",".$request->id_solicitud,
                            'collector_id'=>intval($response->user_id),
                    //      'notification_url'=>'http://www.test-tulocalidad.com.ve/mp',

                        ];                  

        $preference = $mp->create_preference($preference_data);
        

        $solicitud->update([
                        'estatus_solicitud'             => 3,
                        'fecha_finalizado_solicitud'    => \Carbon\Carbon::now(),
                        ]);

        return json_encode(['success'=>true, "redirecto"=> $preference['response']['sandbox_init_point']]);
    }

    public function rechazarSolicitud($id_empresa, $id_solicitud, Request $request){

        $solicitud = Solicitud::find($id_solicitud);
        if (\Carbon\Carbon::now() < $solicitud->fecha_vencimiento_solicitud ){
            $solicitud->update([
                            'estatus_solicitud'             =>5,
                            'fecha_finalizado_solicitud'    => \Carbon\Carbon::now(),
                            ]);
            return json_encode(['success'=>false, 'msj'=>'solicitud vencida']);
        };

        $solicitud->update([
                        'estatus_solicitud'                 => 4,
                        'fecha_finalizado_solicitud'        => \Carbon\Carbon::now(),
                        ]);
        return json_encode(['success'=>true,]);
    }



    public function destroy($id_empresa, $id){
        return redirect('/');
    }

}
