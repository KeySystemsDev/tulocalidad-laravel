<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\Carrito;

class ApisController extends Controller {


	public function __construct (){
		$this->beforeFilter('@filter');
	}


	public function filter(){
		    header('Access-Control-Allow-Origin: *');
		    header('Access-Control-Allow-Methods: GET, POST');
		    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
		    header('Access-Control-Allow-Credentials: true');

	}

	public function getProductos($empresa){
		$model = Producto::where('id_empresa', $empresa)->get()->toArray();

		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

	public function getServicios($empresa){
		$model = Servicio::where('id_empresa', $empresa)->get()->toArray();

		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

	public function getPerfilEmpresa($empresa){
		$model = Empresa::find($empresa);
		if (!$model){
					return json_encode(["success" => false,]);
		}
		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

	public function getDetalleProducto($producto){
		$model = Producto::find($producto);
		if (!$model){
					return json_encode(["success" => false,]);
		}
		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

	public function getDetalleServicio($servicio){
		$model = Servicio::find($servicio);
		if (!$model){
					return json_encode(["success" => false,]);
		}
		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

	public function listCarrito(Request $request){
		$model = Carrito::where('id_usuario', $request->id_usuario)
							->where('id_empresa',$request->id_empresa)
							->get()
							->toArray();

		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}


	public function agregarCarrito(Request $request){
		Carrito::create([
						"id_producto"=>$request->id_producto,
						"id_usuario"=>$request->id_usuario,
						"cantidad_producto_carrito"=>$request->cantidad_producto,
						]);
		
		return json_encode([
						"success" => true,
						]);
	}

	public function eliminarCarrito(Request $request){
		$producto_carrito = Carrito::find($request->id_producto_carrito);
		if(!$producto_carrito){
			return json_encode(["success" => false,]);
		};
		$producto = Producto::find($producto_carrito->id_producto);
		
		$producto_carrito->delete();
		return json_encode(["success" => true,]);
	}

}
