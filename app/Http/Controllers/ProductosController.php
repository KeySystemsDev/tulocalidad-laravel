<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Producto;
use App\Models\Estado;
use App\Models\Imagen;
use App\Models\Empresa;
use Auth;

class ProductosController extends Controller
{

    public function __construct(){
        //$this->beforeFilter('@permisos');
        $this->beforeFilter('@find', ['only' => ['index','show','update', 'create' ,'edit','destroy']]);
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
        $productos = json_encode(
                        Producto::where('id_empresa', $id_empresa)
                                    ->where('habilitado_producto',1)
                                    ->paginate(10)
                                    ->toArray()
                    );
        return view('productos.list',['productos'=>$productos,
                                        'id_empresa'=>$id_empresa,
                                        'nombre_empresa'=>$this->empresa->nombre_empresa]);
    }

    public function create($id_empresa){
        $producto = "";
        $imagenes = "";
        return view('productos.create', ['producto'=>'',
                                            'id_empresa'=>$id_empresa,
                                            'nombre_empresa'=>$this->empresa->nombre_empresa,
                                            'imagenes'=>'',]);
    }

    public function store(Request $request){
        $request['id_usuario']=Auth::user()->id_usuario;
        \DB::beginTransaction();
        try {
            $producto = Producto::create($request->all());
            foreach ($request->imagen as $nombreArchivo) {
                if ($nombreArchivo){
                    $nombre_carpeta = 'productos';
                    $imgController  = new ImgController();
                    $result = $imgController->create_thumbnails($nombreArchivo, $nombre_carpeta); 
                    if (!$result['success']){
                        dd($result);
                    }
                    Imagen::create(['nombre_imagen_producto'  => $result['data']['nombreArchivo'], 
                                              'id_producto'   => $producto->id_producto]);
                }
            };
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
        }
        return redirect('/empresas/'.$request->id_empresa.'/productos');
    }

    public function show($id_empresa, $id){
        $producto = Producto::find($id);
        $imagenes = Imagen::where('id_producto',$id)->get();
        return view('productos.detalle', ['producto'=>$producto,
                                            'id_empresa'=>$id_empresa,
                                            'nombre_empresa'=>$this->empresa->nombre_empresa,
                                            'imagenes'=>$imagenes,]);
    }

    public function edit($id_empresa, $id){
        $producto = Producto::find($id);
        $imagenes = Imagen::where('id_producto',$id)->get();
        return view('productos.create', ['producto'=>$producto,
                                            'id_empresa'=>$id_empresa,
                                            'nombre_empresa'=>$this->empresa->nombre_empresa,
                                            'imagenes'=>$imagenes,]);
        }

    public function update(Request $request, $id_empresa, $id){
        $producto = Producto::find($id);
        //dd($producto);
        $imagenes = Imagen::where('id_producto',$id)->get();

        \DB::beginTransaction();
        try {
            $producto->fill($request->all());
            $producto->save();
                foreach ($request->imagen as $nombreArchivo) {
                    if ($nombreArchivo){
                        if (!Imagen::where('nombre_imagen_producto',$nombreArchivo)->first()){

                            $nombre_carpeta = 'productos';
                            $imgController  = new ImgController();
                            $result = $imgController->create_thumbnails($nombreArchivo, $nombre_carpeta); 
                            if (!$result['success']){
                                dd($result);
                            }
                            Imagen::create(['nombre_imagen_producto'  => $result['data']['nombreArchivo'], 
                                                      'id_producto'   => $producto->id_producto]);
                        }
                    }
                };

            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
            dd("error");
        }

        return redirect('/empresas/'.$id_empresa.'/productos');
    }

    public function destroyImagen($id_empresa, $id_producto, $id){

        //AGREGAR VALIDACIONES
        
        $imagen = Imagen::find($id);
        $prex               = "productos";
        $imgController      = new ImgController();
        $imgController->DeleteThumbnails($imagen->nombre_imagen_producto, $prex);
        $imagen->delete();
    }



    public function deshabilitar($empresa,$id){
        
        $imagenes = Imagen::where('id_producto',$id);
        foreach ($imagenes->get() as $imagen) {
            $prex               = "productos";
            $imgController      = new ImgController();
            $imgController->DeleteThumbnails($imagen->nombre_imagen_producto, $prex);
        };
        $imagenes->delete();
        return redirect('/empresas/'.$id.'/productos');
    }

    public function destroy($empresa,$id){
        dd("entro");
        $imagenes = Imagen::where('id_producto',$id);
        foreach ($imagenes->get() as $imagen) {
            $prex               = "productos";
            $imgController      = new ImgController();
            $imgController->DeleteThumbnails($imagen->nombre_imagen_producto, $prex);
        };
        $imagenes->delete();
        return redirect('/empresas/'.$id.'/productos');
    }
}
