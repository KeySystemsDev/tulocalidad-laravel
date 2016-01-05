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

	public function index(){
		$productos = Producto::where('habilitado_producto',1)
							->orderBy('id_producto','desc')
							->get();

		return view('/clientes/index');
	}

	public function DetalleEmpresa($id_empresa){
		return view('/clientes/detalle-empresa');
	}

	public function DetalleProducto($id_producto){
		return view('/clientes/detalle-producto');
	}

	public function DetalleServicio($id_servicio){
		return view('/clientes/detalle-servicio');
	}

	public function listarServicios(){
		return view('/clientes/list-servicios');
	}	

	public function listarEmpresas(Request $request){
		$model = Empresa::where('habilitado_empresa', 1)->get();

		return view('/clientes/list-empresas',["empresas"=>$model]);
		//return json_encode(["success" => true,"data" => $model,]);
	}

	public function listarProductos(Request $request){

        $model = json_encode(
                        Producto::where('habilitado_producto', 1)
                            ->paginate(12)
                            ->toArray()
                        );
        
		return view('/clientes/list-productos',["productos"=>$model]);
	}

	public function agregarACarrito($id_producto,$cantidad_producto=1){
		Carrito::create([
						"id_producto"=>$id_producto,
						"id_usuario"=>Auth::user()->id_usuario,
						"cantidad_producto_carrito"=>2,
						]);
		$producto = Producto::find($id_producto);
		//dd($producto->precio_producto);
		//$user = Auth::user();
		//$user->costo_carrito =$user->costo_carrito + $producto->precio_producto;
		//$user->save();
		return redirect('/lista-carrito');
		//$model = Carrito::where('id_usuario', Auth::user()->id_usuario)->get();
		//return view('/clientes/list-productos',["productos"=>$model]);
	}

	public function eliminarDeCarrito($id_producto_carrito){
		$producto_carrito = Carrito::find($id_producto_carrito);
		if(!$producto_carrito){
			return redirect('/lista-carrito');
		};
		$producto = Producto::find($producto_carrito->id_producto);
		
		//$user = Auth::user();
		//$user->costo_carrito = $user->costo_carrito - $producto->precio_producto ;
		//$user->save();	
		$producto_carrito->delete();
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
