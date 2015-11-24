<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Estado;

class EmpresasController extends Controller
{

    public function index(){
        $empresas = Empresa::all();
        return view('empresas.list',compact('empresas'));
    }

    public function create(){
        $estados = Estado::all();
        $empresa = "";
        return view('empresas.create', compact('estados', 'empresa'));
    }

    public function store(Request $request){
        Empresa::create($request->all());
        return redirect('/empresas');
    }

    public function show($id_empresa){
        $empresa = Empresa::find($id_empresa);
        return view('empresas.detalle', compact('empresa','id_empresa'));
    }

    public function edit($id){
        $estados = Estado::all();
        $empresa = Empresa::find($id);
        return view('empresas.create', compact('estados', 'empresa'));
    }

    public function update(Request $request, $id)
    {
        Empresa::find($id)->update($request->all());
        return redirect('/empresas');
    }

    public function destroy($id){
        //
    }
}
