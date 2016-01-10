<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Telefonos;
use App\Models\Redes;
use App\Models\MMRedes;
use Auth;
use Session;
use MP;

class EmpresasController extends Controller
{
    public function __construct(){
        //$this->beforeFilter('@permisos');
        $this->beforeFilter('@find', ['only' => ['show','update','edit','destroy']]);
    }

    public function find(Route $route){
        //$this->empresa = Empresas::find($route->getParameter('admin_empresas'));
        //dd($route->getParameter('empresas'));
        $this->empresa = Empresa::where('id_usuario',Auth::user()->id_usuario)
                            ->where('id_empresa',$route->getParameter('empresas'))
                            ->first();
        if (!$this->empresa){
            Session::flash("mensaje-error","No existe ese registro.");
            return redirect('/empresas');
        }

    }

    public function permisos(Route $route){
        if(Gate::denies('empresas', $route->getName()) ){
            Session::flash("mensaje-error","No tiene permisos para acceder al modulo: ".$route->getName());
            return redirect('/');
        };
    }

    public function index(){
        $empresas = json_encode(
                        Empresa::where('id_usuario',Auth::user()->id_usuario)
                            ->paginate(10)
                            ->toArray()
                        );
        $id_empresa ="";
        return view('empresas.list',compact('empresas', 'id_empresa'));
    }

    public function create(){
        $estados = Estado::all();
        $empresa = "";
        $telefonos ="";
        $redes_empresa ="";
        $id_empresa ="";
        $redes = Redes::where('habilitado_red_social',1)->get();
        return view('empresas.create', compact('estados', 'empresa', 'telefonos','redes','id_empresa'));
    }

    public function store(Request $request){

        $imgController  = new ImgController();
        $nombre_carpeta = 'empresas';
        $result         = $imgController->create_thumbnails($request->namefile, $nombre_carpeta);
        $request['url_imagen_empresa'] = $result['data']['nombreArchivo'];
        $request['id_usuario'] = Auth::user()->id_usuario;
        $empresa = Empresa::create($request->all());
        if ($request->cantidad_telefonos>0){
            for ($i=0 ; $i < $request->cantidad_telefonos ; $i++){
                Telefonos::create(['numero_telefono'=>$request['telefonos'.$i],
                                    //'codigo_telefono'=> $request->codigos[$value],
                                    'id_empresa'=>$empresa->id_empresa]);
            }
        }
        if ($request->cantidad_redes>0){
            for ($i=0 ; $i<$request->cantidad_redes ; $i++) {
                MMRedes::create(['identificador_red'=>$request['identificador_red'.$i],
                                    'id_red_social'=> $request['id_red_social'.$i],
                                    'id_empresa'=>$empresa->id_empresa]);
            }
        };
        $json = [
                'success'=>true,
        ];
        return json_encode($json);
    }

    public function show($id_empresa){
        $telefonos = Telefonos::where('id_empresa',$id_empresa)->get();


        //$redes = MMRedes::where('id_empresa',$id_empresa)->get();

        $redes = \DB::table('t_redes')
                            ->where('t_redes.id_empresa','=',$id_empresa)
                            ->join('t_redes_sociales','t_redes_sociales.id_red_social', '=', 't_redes.id_red_social')
                            ->get();
        return view('empresas.detalle', ['empresa'=> $this->empresa,
                                         'id_empresa'=>$id_empresa,
                                         'nombre_empresa'=>$this->empresa->nombre_empresa,
                                         'redes'=>$redes,
                                         'telefonos'=>$telefonos]);
    }

    public function edit($id_empresa){
        $estados = Estado::all();
        $telefonos = Telefonos::where('id_empresa',$id_empresa)->get();
        $redes = Redes::where('habilitado_red_social',1)->get();
        $redes_empresa = MMRedes::where('id_empresa',$id_empresa)->get();
        return view('empresas.create', ['estados'=>$estados,
                                         'empresa'=>$this->empresa,
                                         'id_empresa'=>$id_empresa,
                                         'nombre_empresa'=>$this->empresa->nombre_empresa,
                                         'telefonos' => $telefonos,
                                         'redes_empresa' => $redes_empresa,
                                         'redes'=>$redes]);
    }

    public function update(Request $request, $id)
    {
        
        if ($this->empresa->url_imagen_empresa != $request->namefile){

            $imgController  = new ImgController();
            $nombre_carpeta = 'empresas';
            $imgController->DeleteThumbnails($this->empresa->url_imagen_empresa, $nombre_carpeta);
            $result         = $imgController->create_thumbnails($request->namefile, $nombre_carpeta);
            $request['url_imagen_empresa'] = $result['data']['nombreArchivo'];
        }
        $this->empresa->fill($request->except('_token','namefile'));
        $this->empresa->save();

        Telefonos::where('id_empresa',$id)->delete();

        if ($request->cantidad_telefonos>0){
            for ($i=0 ; $i < $request->cantidad_telefonos ; $i++){
                Telefonos::create(['numero_telefono'=>$request['telefonos'.$i],
                                    //'codigo_telefono'=> $request->codigos[$value],
                                    'id_empresa'=>$this->empresa->id_empresa]);
            }
        }

        MMRedes::where('id_empresa',$id)->delete();
        if ($request->cantidad_redes>0){
            for ($i=0 ; $i<$request->cantidad_redes ; $i++) {
                MMRedes::create(['identificador_red'=>$request['identificador_red'.$i],
                                    'id_red_social'=> $request['id_red_social'.$i],
                                    'id_empresa'=>$this->empresa->id_empresa]);
            }
        }
        

        $json = [
                'success'=>true,
        ];
        return json_encode($json);
    }

    public function destroy($id){
        $imgController  = new ImgController();
        $nombre_carpeta = 'empresas';
        $imgController->DeleteThumbnails($this->empresa->url_imagen_empresa, $nombre_carpeta);
        Telefonos::where('id_empresa',$id)->delete();
        MMRedes::where('id_empresa',$id)->delete();
        $this->empresa->delete();
        return redirect('/empresas');
    }

    public function validRif(Request $request){
        $json=[];
        $value = $request->value;
        $rifs = Empresa::where('rif_empresa', $request->value)->first();
        if (!$rifs){
            $json=['isValid'=>true,
                   'value'=>$request->value];
        }else{
            $json=['isValid'=>false,
                   'value'=>$request->value];
        }
        return json_encode($json);
    }

    public function configuracionMP(Request $request){

        $fields = array(
            'client_id' => urlencode(env('MP_APP_ID', '')),
            'client_secret' => urlencode(env('MP_APP_SECRET', '')),
            'grant_type' => urlencode('authorization_code'),
            'code' => urlencode($request->code),
            'redirect_uri' => urlencode('https://test-tulocalidad.com.ve/empresas/configuracionMP?id_empresa='.$request->id_empresa),
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
        $response = curl_exec($curl); 
        curl_close($curl);  
        dd('response:'.$response."         ");



        Empresa::find($request->id_empresa)->update(['refresh_token_mercadopago'=>$response->refresh_token,
                                                        'access_token_mercadopago'=>$response->access_token,
                                                        'user_id_mercadopago'=>$response->user_id,
                                                        'habilitado_mercadopago'=>0,
                                                    ]);
        
        return redirect(url('/empresas/'.$request->id_empresa));
    }
}
