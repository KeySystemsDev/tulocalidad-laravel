<?php namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;
use App\Prueba;
use DB;
use Input;
class PruebaController extends Controller {

	public function callprocedure($consulta_estado){

	$call = Prueba::p_consulta_estado();

	print_r($call);

	//return View::make('registro.empresa_registro.empresa_formulario');
	}


	public function prueba(){

		
	return View::make('registro.empresa_registro.empresa_formulario');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function Create(){
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){

		$user = new User;

		$user->name = Input::get('name');
		$user->twitter = Input::get('twitter');

		if ($user->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('users/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShow($id = null)
	{
		$user = User::find($id);

		return View::make('users.show')->with('user',$user);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(){
			$listar_empresas = Empresa::all(); 
			return View::make('registro.empresa_registro.editar', array('empresa' => $listar_empresas));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		$user->name = Input::get('name');
		$user->twitter = Input::get('twitter');

		if ($user->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('users/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if ($user->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('users');
	}

}