<?php namespace App\Http\Controllers\Movil;
header('Access-Control-Allow-Origin: *');
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
	public function ActionCategoriaEstado(){
	$estado=e(Input::get('id_estado'));
	$categorias= DB::select('CALL p_t_empresas(?,?,?)',array('categoria_estado','',$estado));
	echo json_encode($categorias);		
	} 
	public function ActionEmpresaCategoria(){
	$categoria=e(Input::get('id_categoria'));
	$estado=e(Input::get('id_estado'));
	$empresas= DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_categoria','',$estado,$categoria));
	echo json_encode($empresas);		
	} 
	public function ActionPublicidad(){
	$publicidad= DB::select('CALL p_t_empresas(?,?,?,?,?)',array('publicidad','','','',''));
	echo json_encode($publicidad);
	}
}

