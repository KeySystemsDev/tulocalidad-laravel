<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Estado;

class ProductosController extends Controller
{

    public function index($id_empresa){
        $productos = Producto::where('id_empresa', $id_empresa)->get();
        return view('productos.list',compact('productos','id_empresa'));
    }

    public function create($id_empresa){
        $producto = "";
        return view('productos.create', compact('producto','id_empresa'));
    }

    public function store(Request $request){
        Producto::create($request->all());
        return redirect('/empresas/'.$request->id_empresa.'/productos');
    }

    public function show($id_empresa, $id){
        $producto = Producto::find($id);
        return view('productos.detalle', compact('producto','id_empresa'));
    }

    public function edit($id_empresa, $id){
        $producto = Producto::find($id);
        return view('productos.create', compact( 'producto', 'id_empresa'));
    }

    public function update(Request $request, $id_empresa, $id){
        $producto = Producto::find($id)->update($request->except('_method'));
        return redirect('/empresas/'.$id_empresa.'/productos');
    }

    public function destroy($id){
        //
    }
}
