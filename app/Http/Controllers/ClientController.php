<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\Carrito;
use Auth;

class ClientController extends Controller {


	public function __construct (){
		//$this->beforeFilter('@filter');
	}


	public function filter(){
	}

	public function listarEmpresas(Request $request){
		$model = Empresa::where('habilitado_empresa', 1)->get();

		return view('/clientes/list-empresas',["empresas"=>$model]);
		//return json_encode(["success" => true,"data" => $model,]);
	}

	public function listarProductos(Request $request){
		$model = Producto::where('habilitado_producto', 1)->get();
		//dd($model);
		return view('/clientes/list-productos',["productos"=>$model]);
	}

	public function agregarACarrito($id_producto){
		Carrito::create([
					"id_producto"=>$id_producto,
					"id_usuario"=>Auth::user()->id_usuario,
						]);

		return redirect('/lista-carrito');
		//$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get();
		//return view('/clientes/list-productos',["productos"=>$model]);
	}

	public function eliminarDeCarrito($id_producto){
		Carrito::where([
					"id_producto"=>$id_producto,
					"id_usuario"=>Auth::user()->id_usuario,
					])->delete();

		return redirect('/lista-carrito');
		//$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get();
		//return view('/clientes/list-productos',["productos"=>$model]);
	}

	public function listarCarrito(){
		$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get()->toArray();
		//dd($model);
		return view('/clientes/list-carrito',["productos"=>$model]);
	}

	public function comprar(){
		//$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get()->toArray();
		//dd($model);
		return view('/clientes/comprar');
	}

	//PASARELA DE PAGO
	//PASO1: seleccionar tipo de pago
	public function tipoDePago(){
		return view('/clientes/pasarela-de-pago/tipo-pago');
	}

	//Colo
	public function mercadopago1(){
		//$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get()->toArray();
		//dd($model);
		return view('/clientes/pasarela-de-pago/mercadopago1');
	}
		//Colo
	public function postMercadopago1(){
		//$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get()->toArray();
		//dd($model);
		return view('/clientes/pasarela-de-pago/mercadopago1');
	}

}
