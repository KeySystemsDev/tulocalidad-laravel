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
							->get()
							->random(6);
		
		$servicios = Servicio::where('habilitado_servicio',1)
							->get()
							->random(4);

		$empresas = Empresa::where('habilitado_empresa',1)
							->get()
							->random(6);

		return view('/clientes/index',["productos"=>$productos,
										"servicios"=>$servicios,
										"empresas"=>$empresas,
										]);
	}

	public function DetalleEmpresa($id){
		$model = Empresa::find($id)->toArray();
		$model_ser = Sevicio::where('id_empresa',$id)->toArray();
		$model_prod = Producto::where('id_empresa',$id)->toArray();
		return view('/clientes/detalle-empresa', ["empresa"=>$model,
												  "servicios"=>$model_ser,
												  "productos"=>$model_prod,]);
	}

	public function DetalleProducto($id){
		$model = Producto::find($id)->toArray();
		return view('/clientes/detalle-producto',["producto"=>$model]);
	}

	public function DetalleServicio($id){
		$model = Servicio::find($id)->toArray();
		return view('/clientes/detalle-servicio',["servicio"=>$model]);
	}

	public function listarServicios(){
        $model = json_encode(
						Servicio::where('habilitado_servicio', 1)->get()
                            ->paginate(12)
                            ->toArray()
                        );
		return view('/clientes/list-servicios',["servicios"=>$model]);
	}	

	public function listarEmpresas(Request $request){
        $model = json_encode(
                        Empresa::where('habilitado_empresa', 1)->get()
                            ->paginate(12)
                            ->toArray()
                        );
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

	public function agregarACarrito(Request $request){

		Carrito::create([
						"id_producto"=>$request->id_producto,
						"id_usuario"=>Auth::user()->id_usuario,
						"cantidad_producto_carrito"=>$request->cantidad_producto,
						]);
		
		return redirect('/lista-carrito');
	}

	public function eliminarDeCarrito($id_producto_carrito){
		$producto_carrito = Carrito::find($id_producto_carrito);
		if(!$producto_carrito){
			return redirect('/lista-carrito');
		};
		$producto = Producto::find($producto_carrito->id_producto);
		
		$producto_carrito->delete();
		return redirect('/lista-carrito');
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
