<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Servicio;
use App\Models\Empresa;
use Auth;
use Session;

class ServiciosController extends Controller
{

    public function __construct(){
        //$this->beforeFilter('@permisos');
        $this->beforeFilter('@find', ['only' => ['index','create','show','update','edit','destroy']]);
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


    public function index($id_empresa){
        $servicios = json_encode(
                            Servicio::where('id_empresa', $id_empresa)
                                        ->paginate(10)
                                        ->toArray()
                                );
        return view('servicios.list',['servicios'=>$servicios,
                                        'id_empresa'=>$id_empresa,
                                        'nombre_empresa'=>$this->empresa->nombre_empresa]);
    }

    public function create($id_empresa){
        $servicio = "";
        return view('servicios.create', ['servicio'=>$servicio,
                                            'id_empresa'=>$id_empresa,
                                            'nombre_empresa'=>$this->empresa->nombre_empresa]);
    }

    public function store(Request $request){
        $imgController  = new ImgController();
        $nombre_carpeta = 'servicios';
        $result         = $imgController->create_thumbnails($request->namefile, $nombre_carpeta);
        $request['url_imagen_servicio'] = $result['data']['nombreArchivo'];
        Servicio::create($request->all());
        return redirect('/empresas/'.$request->id_empresa.'/servicios');
    }

    public function show($id_empresa, $id){
        $servicio = Servicio::find($id);
        return view('servicios.detalle', ['servicio'=>$servicio,
                                            'id_empresa'=>$id_empresa,
                                            'nombre_empresa'=>$this->empresa->nombre_empresa]);
    }

    public function edit($id_empresa, $id){
        $servicio = Servicio::find($id);
        return view('servicios.create',['servicio'=>$servicio,
                                        'id_empresa'=>$id_empresa,
                                        'nombre_empresa'=>$this->empresa->nombre_empresa]);
    }

    public function update(Request $request, $id_empresa, $id){

        $servicio = Servicio::find($id);//->update($request->all());
        if ($servicio->url_imagen != $request->namefile){

            $imgController  = new ImgController();
            $nombre_carpeta = 'servicios';
            $imgController->DeleteThumbnails($servicio->url_imagen_servicio, $nombre_carpeta);
            $result         = $imgController->create_thumbnails($request->namefile, $nombre_carpeta);
            $request['url_imagen_servicio'] = $result['data']['nombreArchivo'];
        }
        $servicio->fill($request->except('_token','namefile'));
        $servicio->save();


        return redirect('/empresas/'.$id_empresa.'/servicios');
    }

    public function deshabilitar($empresa,$id){
        
        // $imagenes = Imagen::where('id_producto',$id);
        // foreach ($imagenes->get() as $imagen) {
        //     $prex               = "productos";
        //     $imgController      = new ImgController();
        //     $imgController->DeleteThumbnails($imagen->nombre_imagen_producto, $prex);
        // };
        // $imagenes->delete();
        // return redirect('/empresas/'.$id.'/productos');
    }

    public function destroy($empresa,$id){
        dd("entro");
        // $imagenes = Imagen::where('id_producto',$id);
        // foreach ($imagenes->get() as $imagen) {
        //     $prex               = "productos";
        //     $imgController      = new ImgController();
        //     $imgController->DeleteThumbnails($imagen->nombre_imagen_producto, $prex);
        // };
        // $imagenes->delete();
        // return redirect('/empresas/'.$id.'/productos');
    }
}
