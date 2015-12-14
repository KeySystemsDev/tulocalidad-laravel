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

class EmpresasController extends Controller
{
    public function __construct(){
        //$this->beforeFilter('@permisos');
        $this->beforeFilter('@find', ['only' => ['show','update','edit','destroy']]);
    }

    public function find(Route $route){
        //$this->empresa = Empresas::find($route->getParameter('admin_empresas'));
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
        $empresas = Empresa::where('id_usuario',Auth::user()->id_usuario)
                            ->get();
        return view('empresas.list',compact('empresas'));
    }

    public function create(){
        $estados = Estado::all();
        $empresa = "";
        $telefonos ="";
        $redes_empresa ="";
        $redes = Redes::where('habilitado_red_social',1)->get();
        return view('empresas.create', compact('estados', 'empresa', 'telefonos','redes'));
    }

    public function store(Request $request){
        //dd($request->all());
        $imgController  = new ImgController();
        $nombre_carpeta = 'empresas';
        $result         = $imgController->create_thumbnails($request->namefile, $nombre_carpeta);
        $request['url_imagen_empresa'] = $result['data']['nombreArchivo'];
        $request['id_usuario'] = Auth::user()->id_usuario;
        $empresa = Empresa::create($request->all());
        if ($request->telefonos){
            foreach($request->telefonos as $value=>$telefono) {
                Telefonos::create(['numero_telefono'=>$telefono,
                                    'codigo_telefono'=> $request->codigos[$value],
                                    'id_empresa'=>$empresa->id_empresa]);
            }
        }
        if ($request->identificador_red){
            foreach($request->identificador_red as $value=>$identificador_red) {
                MMRedes::create(['identificador_red'=>$identificador_red,
                                    'id_red_social'=> $request->id_red_social[$value],
                                    'id_empresa'=>$empresa->id_empresa]);
            }
        }        
        return redirect('/empresas');
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

        if ($request->telefonos){
            foreach ($request->telefonos as $value=>$telefono) {
                Telefonos::create(['numero_telefono'=>$telefono,
                                    'codigo_telefono'=> $request->codigos[$value],
                                    'id_empresa'=>$this->empresa->id_empresa]);
            }
        }
        if ($request->identificador_red){
            foreach($request->identificador_red as $value=>$identificador_red) {
                MMRedes::create(['identificador_red'=>$identificador_red,
                                    'id_red_social'=> $request->id_red_social[$value],
                                    'id_empresa'=>$this->empresa->id_empresa]);
            }
        }
        

        return redirect('/empresas');
    }

    public function destroy($id){
        //
    }
}
