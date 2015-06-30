<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServicioController extends Controller {

	public function Index(){
		return view('servicio/recomendados');
	}

	public function Todo(){
		return view('servicio/estados');
	}

	public function Estado($id_estado){
		return view('servicio/categorias', compact('id_estado'));
	}

	public function Categoria($id_estado, $id_categoria){
		return view('servicio/empresas', compact('id_estado', 'id_categoria'));
	}

	public function Empresa($id_estado, $id_categoria, $id_empresa){
		return view('servicio/empresa_detalle', compact('id_estado', 'id_categoria', 'id_empresa'));
	}

	public function show($id){
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		//
	}

}
