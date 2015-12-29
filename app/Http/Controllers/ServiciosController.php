<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Servicio;

class ServiciosController extends Controller
{
    public function index($id_empresa){
        $servicios = json_encode(
                            Servicio::where('id_empresa', $id_empresa)
                                        ->paginate(10)
                                        ->toArray()
                                );
        return view('servicios.list',compact('servicios','id_empresa'));
    }

    public function create($id_empresa){
        $servicio = "";
        return view('servicios.create', compact('servicio','id_empresa'));
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
        return view('servicios.detalle', compact('servicio','id_empresa'));
    }

    public function edit($id_empresa, $id){
        $servicio = Servicio::find($id);
        return view('servicios.create', compact( 'servicio', 'id_empresa'));
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

    public function destroy($id){
        //
    }
}
