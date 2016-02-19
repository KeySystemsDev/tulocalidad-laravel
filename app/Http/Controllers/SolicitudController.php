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

    public function store(Request $request){
        return json_encode();
    }

    public function show($id_empresa, $id){
        return view('solicitudes.detalle', []);
    }

    public function destroy($id_empresa, $id){
        
        return redirect('/');
    }

}
