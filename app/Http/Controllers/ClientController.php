<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\Carrito;
use Auth;
use MP;

class ClientController extends Controller {


	public function __construct (){
		//$this->beforeFilter('@filter');
	}


	public function filter(){
	}

	public function index(){
		$cantidad_productos = Producto::where('habilitado_producto',1)
							->get();
		if 	($cantidad_productos->count()<12){
			$productos = $cantidad_productos;
		}else{
			$productos = $cantidad_productos->random(12);
		}
							
		
		$conteo = Servicio::where('habilitado_servicio',1)
							->get();

		if ($conteo->count()<4){
			$servicios = $conteo;
		}else{
			$servicios = $conteo->random(4);
		};

		$cantidad_empresas_1 = Empresa::where('habilitado_empresa',1)
							->get();
		if 	($cantidad_empresas_1->count()<3){
			$empresas_1 = $cantidad_empresas_1;
		}else{
			$empresas_1 = $cantidad_empresas_1->random(3);
		}

		$cantidad_empresas_2 = Empresa::where('habilitado_empresa',1)
							->get();
		if 	($cantidad_empresas_2->count()<3){
			$empresas_2 = $cantidad_empresas_2;
		}else{
			$empresas_2 = $cantidad_empresas_2->random(3);
		}							

		return view('/clientes/index',["productos"=>$productos,
										"servicios"=>$servicios,
										"empresas_1"=>$empresas_1,
										"empresas_2"=>$empresas_2,
										]);
	}

	public function DetalleEmpresa($id){
		$model = (string) Empresa::find($id);
		$model_ser =  Servicio::where('id_empresa',$id)->get()->toArray();
		$model_prod =  Producto::where('id_empresa',$id)->get()->toArray();
		return view('/clientes/detalle-empresa', ["empresa"=>$model,
												  "servicios"=>$model_ser,
												  "productos"=>$model_prod,]);
	}

	public function DetalleProducto($id){
		$model = (string) Producto::find($id);
		return view('/clientes/detalle-producto',["producto"=>$model]);
	}

	public function DetalleServicio($id){
		$model = (string) Servicio::find($id);
		return view('/clientes/detalle-servicio',["servicio"=>$model]);
	}

	public function listarServicios(){
        $model = json_encode(
						Servicio::where('habilitado_servicio', 1)
                            ->paginate(12)
                            ->toArray()
                        );
		return view('/clientes/list-servicios',["servicios"=>$model]);
	}	

	public function listarEmpresas(Request $request){
        $model = json_encode(
                        Empresa::where('habilitado_empresa', 1)
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

		$producto_carrito = Producto::find($request->id_producto);
		if (!$producto_carrito){
			return json_encode(['false'=>$producto_carrito]);
		}
		Carrito::create([
						"id_producto"=>$request->id_producto,
						"id_empresa"=>$producto_carrito->id_empresa,
						"id_usuario"=>Auth::user()->id_usuario,
						"cantidad_producto_carrito"=>$request->cantidad_producto,
						]);
		
		return redirect()->back();
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
		$model = Carrito::where('id_usuario', Auth::user()->id_usuario)
											->orderBy('id_empresa')
											->get()
											->toArray();
		$response = [];
		foreach ($model as $producto) {
			if (!array_key_exists ($producto['nombre_empresa'], $response )){
				$response[$producto['nombre_empresa']] = [$producto];
			}else{

			array_push($response[$producto['nombre_empresa']], $producto);
			}
		}


		return view('/clientes/list-carrito',["productos"=>$response]);
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
	public function postMercadopago1(Request $request){
		$empresa = Empresa::find($request->id_empresa);
		$mp = new MP($empresa->access_token_mercadopago);
		$articulos = Carrito::where('id_empresa',$request->id_empresa)
							->where('id_usuario', Auth::user()->id_usuario)
							->get();
		
		$preference_data=[	
							'items'=>[],
							'back_urls'=>[
								'success'=>url('compras/mercadopago/success'),
								'pending'=>url('compras/mercadopago/pending'),
								'failure'=>url('compras/mercadopago/failure'),
							],
							'payer'=>[
								'email'=>Auth::user()->correo_usuario,

							]
						];					
		foreach ($articulos as $articulo) {
			
			$articulo_data = [
					'title' => $articulo['nombre_empresa'],
					'quantity' =>intval($articulo->cantidad_producto_carrito),
					'description' =>'asd',
					'picture_url' =>url('/uploads/empresas/high/'.$articulo['url_imagen_empresa']),
					'currency_id'=> 'VEF',
					'unit_price'=> (float)$articulo['data_producto']->precio_producto
			];
			array_push($preference_data['items'],$articulo_data);
		};
		$preference = $mp->create_preference($preference_data);
		return redirect($preference['response']['sandbox_init_point']);
	}

}
