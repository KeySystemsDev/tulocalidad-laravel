<?php namespace App\Http\Controllers\Movil;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller {


	public function actionEmpresa(){
		$estados = DB::table('t_estados')->get();	
		print_r($estados);		
	} 

}
