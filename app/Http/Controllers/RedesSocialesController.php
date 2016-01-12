<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\Redes;
use Session;

class RedesSocialesController extends Controller
{

    public function __construct(){
        //$this->beforeFilter('@permisos');
        $this->beforeFilter('@find', ['only' => ['show','update','edit','destroy']]);
    }

    public function find(Route $route){
        //dd($route->parameters());
        //dd($route->getParameter('redes_sociales'));
        $this->red = Redes::find($route->getParameter('redes_sociales'));
        if (!$this->red){
            //Session::flash("mensaje-error","No existe ese registro.");
            return redirect('/redes_sociales');
        }

    }

    public function index(){
        $redes = Redes::where('habilitado_red_social',1)->get();
        return view('redes.list',compact('redes'));
    }

    public function create(){
        $red = "";
        return view('redes.create', compact('red'));
    }

    public function store(Request $request){
        \DB::beginTransaction();
        try {

            Redes::create($request->all());

            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
        }
        return redirect('/redes_sociales');
    }

    public function show($id){
        return view('redes.detalle', ['red'=>$this->red]);
    }

    public function edit($id){
        return view('redes.create', ['red'=>$this->red]);
    }

    public function update(Request $request, $id){

        \DB::beginTransaction();
        try {

            $this->red->update($request->all());
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
        }

        return redirect('/redes_sociales');
    }


    public function destroy($id){
        $this->red->fill(['habilitado_red_social'=>0]);
        $this->red->save();
        return redirect()->back();
    }
}
