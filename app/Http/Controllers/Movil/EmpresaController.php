<?php namespace App\Http\Controllers\Movil;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class EmpresaController extends Controller {
	public function ActionEstados(){
		$estados = DB::table('t_estados')->get();	
		echo json_encode($estados);		
	} 
	public function ActionCategorias(){
		$categoria = DB::table('t_categoria')->get();	
		echo json_encode($categoria);		
	} 
}
