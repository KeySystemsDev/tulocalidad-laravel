<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Estado;
use App\Models\Imagen;

class ProductosController extends Controller
{

    public function index($id_empresa){
        $productos = Producto::where('id_empresa', $id_empresa)->get();
        return view('productos.list',compact('productos','id_empresa'));
    }

    public function create($id_empresa){
        $producto = "";
        $imagenes = "";
        return view('productos.create', compact('producto','id_empresa','imagenes'));
    }

    public function store(Request $request){
        // \DB::beginTransaction();
        // try {
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
        //     \DB::commit();
        // } catch (Exception $e) {
        //     \DB::rollback();
        // }
        return redirect('/empresas/'.$request->id_empresa.'/productos');
    }

    public function show($id_empresa, $id){
        $producto = Producto::find($id);
        $imagenes = Imagen::where('id_producto',$id)->get();
        return view('productos.detalle', compact('producto','id_empresa', 'imagenes'));
    }

    public function edit($id_empresa, $id){
        $producto = Producto::find($id);
        $imagenes = Imagen::where('id_producto',$id)->get();
        return view('productos.create', compact( 'producto', 'id_empresa','imagenes'));
    }

    public function update(Request $request, $id_empresa, $id){
        $producto = Producto::find($id);
        $imagenes = Imagen::where('id_producto',$id)->get();

        \DB::beginTransaction();
        try {
            $producto->fill($request->only('nombre_producto',
                                            'descripcion_producto',
                                            'precio_producto',
                                            'texto_enriquecido_producto'));

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



    public function destroy($id){
        //
    }
}
