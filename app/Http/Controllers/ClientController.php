<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\Carrito;
use App\Models\Compras;
use App\Models\ProductoFavorito;
use App\Models\ServicioFavorito;
use App\Models\ProductoComprado;
use App\Models\Solicitud;
use Auth;
use Session;
use MP;

define ('SITE', realpath(dirname("uploads")));

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
		$model_ser =  (string) Servicio::where('id_empresa',$id)->get();
		$model_prod =  (string) Producto::where('id_empresa',$id)->get();
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


	public function listaCompras(Request $request){
		$compras = Compras::where('habilitado_compra',1)
							->where('id_usuario',Auth::user()->id_usuario)
							->orderBy('id_compra','desc')
							->get()
							->toArray();
		return view('/clientes/list-compras',compact('compras'));
	}

	public function listaContrato(){
		$solicitudes = Solicitud::all();
		return view('/clientes/list-contratos', compact('solicitudes'));
	}

	public function listaFavorito(){
		$productos = json_encode(ProductoFavorito::where('id_usuario',Auth::user()->id_usuario)->get()->toArray());
		$servicios = json_encode(ServicioFavorito::where('id_usuario',Auth::user()->id_usuario)->get()->toArray());
		return view('/clientes/list-favoritos',compact('productos','servicios'));
	}

	public function agregarFavorito(Request $request){
		if($request->tipo =='servicios'){
			ServicioFavorito::firstOrCreate([
									'id_usuario'=>Auth::user()->id_usuario,
									'id_servicio' =>$request->id,
										]);
			return json_encode(['success'=>true]);
		}elseif($request->tipo =='productos'){
			ProductoFavorito::firstOrCreate([
									'id_usuario'=>Auth::user()->id_usuario,
									'id_producto' =>$request->id,
										]);
			return json_encode(['success'=>true,'request'=>$request->all()]);
		}
		return json_encode(['success'=>false]);
	}

	public function eliminarFavorito(Request $request){
		if($request->tipo =='servicios'){
			ServicioFavorito::where('id_servicio',$request->id)
			 					->where('id_usuario',Auth::user()->id_usuario)
			 					->delete();
		}elseif($request->tipo =='productos'){
			ProductoFavorito::where('id_producto',$request->id)
			 					->where('id_usuario',Auth::user()->id_usuario)
			 					->delete();
		}
		return json_encode(['success'=>true]);
	}




		//Colo
	public function postMercadopago1(Request $request){

		$empresa = Empresa::find($request->id_empresa);
		$fields = array(
            'client_id' => env('MP_APP_ID', ''),
            'client_secret' => env('MP_APP_SECRET', ''),
            'grant_type' => 'refresh_token',
            'refresh_token' => $empresa->refresh_token_mercadopago,
        );
        $fields_string="";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, 'https://api.mercadolibre.com/oauth/token');
        curl_setopt($curl, CURLOPT_HTTPHEADER , ['content-type: application/x-www-form-urlencoded', 'accept: application/json']);
        curl_setopt($curl, CURLOPT_POST , true);
        curl_setopt($curl, CURLOPT_POSTFIELDS , $fields_string);
        $response =  json_decode(curl_exec($curl)); 
        curl_close($curl);
        $empresa->update(['refresh_token_mercadopago'=>$response->refresh_token,
                                'access_token_mercadopago'=>$response->access_token,
                                'user_id_mercadopago'=>$response->user_id,
                                'fecha_vencimiento_mercadopago'=>$response->expires_in,
                                ]);
        $empresa->save();
		$mp = new MP($response->access_token);
		$mp->sandbox_mode(TRUE);
		$articulos = Carrito::where('id_empresa',$request->id_empresa)
							->where('id_usuario', Auth::user()->id_usuario)
							->get();
		
		$preference_data=[	
							'items'=>[],
							'back_urls'=>[
								'success'=>url('comprar/mercadopago/respuesta/'),
								'pending'=>url('comprar/mercadopago/respuesta/'),
								'failure'=>url('comprar/mercadopago/respuesta/'),
							],
							'payer'=>[
								'email'=>Auth::user()->correo_usuario,

							],
							'external_reference'=>Auth::user()->id_usuario.",".$request->id_empresa,
							'collector_id'=>intval($response->user_id),
							'notification_url'=>'http://www.test-tulocalidad.com.ve/mp',
						];					
		foreach ($articulos as $articulo) {
			
			$articulo_data = [
					'title' => $articulo['nombre_empresa'],
					'quantity' =>intval($articulo->cantidad_producto_carrito),
					'description' =>'Lista de ariticulos de la tienda '.$articulo['nombre_empresa'],
					'picture_url' =>url('/uploads/empresas/mid/'.$articulo['url_imagen_empresa']),
					'currency_id'=> 'VEF',
					'unit_price'=> (float)$articulo['data_producto']->precio_producto
			];
			array_push($preference_data['items'],$articulo_data);
		};
		$preference = $mp->create_preference($preference_data);
		return redirect($preference['response']['sandbox_init_point']);
	}


	public function respuestaCompra(Request $request){
		// $mp = new MP(env('MP_APP_ID'),env('MP_APP_SECRET'));
		
		// //dd($request->all());
		// $precio_total = 0;
		// $result = explode(",", $request->external_reference);
		// $id_usuario = $result[0];
		// $id_empresa = $result[1];
		// $carritos = Carrito::where('id_usuario',$id_usuario)
		// 					->where('id_empresa',$id_empresa);

		// $lista_compra = $carritos->get();

		// $compra = Compras::create([
		// 						'tipo_pago_compra'=>'mercadopago',
		// 						'identificador_pago_compra'=>$request->preference_id,
		// 						'precio_total_compra',
		// 						'estatus_compra'=>$request->collection_status,
		// 						'id_usuario' => $id_usuario,
		// 						'id_empresa' => $id_empresa,
		// 						]
		// 	);
		// foreach ($lista_compra as $producto) {
		// 	ProductoComprado::create([
		// 					'id_empresa'					=>$id_empresa,
		// 					'id_compra'						=>$compra->id_compra,
		// 					'primera_imagen' 				=>$producto['data_producto']['primera_imagen']['nombre_imagen_producto'],
		// 					'cantidad_producto_comprados'	=>$producto->cantidad_producto_carrito,
		// 					'precio_unidad'   				=>$producto['data_producto']['precio_producto'],
		// 					'precio_total'					=>$producto['sub_total'],
		// 					'nombre_producto'				=>$producto['data_producto']['nombre_producto'],
		// 					'descripcion_producto'			=>$producto['data_producto']['descripcion_producto'],
		// 				]);
		// 	$precio_total +=  intval($producto['sub_total']);
		// };

		// $compra->fill(['precio_total_compra'=>$precio_total]);
		// $compra->save();
		//ENVIAR CORREOS ELECTRONICOS AL VENDEDOR Y AL COMPRADOR
		if($request->collection_status=='failure'){
			Session::flash('mensaje', 'Pago rechazado.');
		};

		if($request->collection_status=='pending'){
			Session::flash('mensaje', 'Procesando su pago.');
		};

		if($request->collection_status=='success'){
			Session::flash('mensaje', 'Pago Procesado exitosamente.');
		};
		
		return redirect('/compras');
	}



	public function respuestaMercadopagoMovil(Request $request){

		//ENVIAR CORREOS ELECTRONICOS AL VENDEDOR Y AL COMPRADOR
		if($request->collection_status=='failure'){
			Session::flash('mensaje', 'Pago rechazado.');
		};

		if($request->collection_status=='pending'){
			Session::flash('mensaje', 'Procesando su pago.');
			$carritos->delete();
		};

		if($request->collection_status=='success'){
			Session::flash('mensaje', 'Pago Procesado exitosamente.');
			$carritos->delete();
		};
		
		return view('/clientes/volver');
	}
	public function IPNotificadorGet(Request $request){

		$mp = new MP(env('MP_APP_ID',''), env('MP_APP_SECRET', ''));
		$payment_info= 0;
		$mp->sandbox_mode(TRUE);
		// Get the payment and the corresponding merchant_order reported by the IPN.
		if($request->topic == 'payment'){
			//HelperController::sendEmail("hsh283@gmail.com","homero Hernandez",'prueba', 'emails.prueba', ['response'=>"request ".$request]);
			$payment_info = $mp->get("/collections/notifications/".$request->id);
			//HelperController::sendEmail("hsh283@gmail.com","homero Hernandez",'prueba', 'emails.prueba', ['response'=>"Payment info ".$payment_info]);
			$merchant_order_info = $mp->get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);
			//HelperController::sendEmail("hsh283@gmail.com","homero Hernandez",'prueba', 'emails.prueba', ['response'=>"Mercarnt Order ".$merchant_order_info]);
		// Get the merchant_order reported by the IPN.
		} else if($request->topic == 'merchant_order'){
			$merchant_order_info = $mp->get("/merchant_orders/" . $request->id);
		}

		dd( $request , $merchant_order_info, $payment_info);
	}

	public function IPNotificador(Request $request){

		HelperController::sendEmail("hsh283@gmail.com","homero Hernandez",'prueba', 'emails.prueba', ['response'=>"request ".$request]);
		$mp = new MP(env('MP_APP_ID',''), env('MP_APP_SECRET', ''));
		$mp->sandbox_mode(TRUE);

		// Get the payment and the corresponding merchant_order reported by the IPN.
		if($request->topic == 'payment'){
			$payment_info = $mp->get("/collections/notifications/".$request->id);
			$merchant_order_info = $mp->get("/merchant_orders/".$payment_info["response"]["collection"]["merchant_order_id"]);
		// Get the merchant_order reported by the IPN.
		} else if($request->topic == 'merchant_order'){
			$merchant_order_info = $mp->get("/merchant_orders/" . $request->id);
		}

		if ($merchant_order_info["status"] == 200) {
			// If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items 
			$paid_amount = 0;

			foreach ($merchant_order_info["response"]["payments"] as  $payment) {
				if ($payment['status'] == 'approved'){
					$paid_amount += $payment['transaction_amount'];
				}	
			}

			if($paid_amount >= $merchant_order_info["response"]["total_amount"]){

				print_r("Totally paid. Release your item.");

			} else {
				print_r("Not paid yet. Do not release your item.");
			}
		}


		// return('200');
	
	}

}
