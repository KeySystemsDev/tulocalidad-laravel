<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Servicio;

class ServiciosController extends Controller
{
    public function index($id_empresa){
        $servicios = Servicio::where('id_empresa', $id_empresa)->get();
        return view('servicios.list',compact('servicios','id_empresa'));
    }

    public function create($id_empresa){
        $servicio = "";
        return view('servicios.create', compact('servicio','id_empresa'));
    }

    public function store(Request $request){
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
        $servicio = Servicio::find($id)->update($request->except('_method'));
        return redirect('/empresas/'.$id_empresa.'/servicios');
    }

    public function destroy($id){
        //
    }
}
