<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;
use App\Prueba;
use DB;
use Input;
class EmpresaController extends controller {

	public function crear(){
		if($_POST){
			$empresa = new Empresa;
			$empresa->empresa_nombre = e(Input::get('nombre'));
			$empresa->empresa_rif = e(Input::get('rif'));
			$empresa->empresa_direccion = e(Input::get('direccion'));
			$empresa->empresa_categoria = e(Input::get('categoria'));
			$empresa->empresa_estado = e(Input::get('estados'));					
			$empresa->empresa_telefono = e(Input::get('telefono'));
			$empresa->empresa_telefono2 = e(Input::get('telefono2'));
			$empresa->empresa_telefono3 = e(Input::get('telefono3'));
			$empresa->empresa_movil = e(Input::get('celular'));
			$empresa->save();

			return View::make('registro.empresa_registro.satisfactorio');
		}
	}


	public function mostrar(){

		
		return View::make('registro.empresa_registro.empresa_formulario');

	}

	
	public function actualizar(){
		
		return View::make('registro.empresa_registro.empresa_formulario');
	
	}

 
	public function eliminar(){

		return Redirect::to('users/create');
	}
