<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\Carrito;
use App\User;
use MP;
use Auth;

class ApisController extends Controller {


	public function __construct (){
		$this->beforeFilter('@filter');
	}


	public function filter(){
		    header('Access-Control-Allow-Origin: *');
		    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		    header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
		    header('Access-Control-Allow-Credentials: true');

				//    header("Access-Control-Allow-Origin: *");

		  // // ALLOW OPTIONS METHOD
		  // $headers = [
		  //        'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
		  //        'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
		  //    ];
		  // if($request->getMethod() == "OPTIONS") {
		  //        // The client-side application can set only headers allowed in Access-Control-Allow-Headers
		  //        return Response::make('OK', 200, $headers);
		  //    }

		  //    $response = $next($request);
		  //    foreach($headers as $key => $value) 
		  //     $response->header($key, $value);
		  // return $response;

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
		//dd($model);
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
		$articulos = Carrito::where('id_usuario', $request->id_usuario)
							->where('id_empresa',$request->id_empresa)
							->get();

		$model = $articulos->toArray();
		$cantidad_articulos = $articulos->count();
		$total = 0;
		foreach ($model as $articulo) {
			$total = (float)$articulo['sub_total'] + (float) $total;
		}

		return json_encode([
						"success" => true,
						"data" => [ 
									"articulos"=>$model,
									"total"=>$total,
									"cantidad"=>$cantidad_articulos,
									],
						]);
	}


	public function agregarCarrito(Request $request){
		Carrito::create([
						"id_producto"=>$request->id_producto,
						"id_usuario"=>$request->id_usuario,
						"cantidad_producto_carrito"=>$request->cantidad_producto,
						"id_empresa"=>$request->id_empresa,
						]);
		
		return json_encode([
						"success" => true,
						]);
	}

	public function eliminarCarrito(Request $request){
		$producto_carrito = Carrito::where('id_carrito',$request->id_producto_carrito)->first();
		if(!$producto_carrito){
			return json_encode(["success" => false,]);
		};
		$producto = Producto::find($producto_carrito->id_producto);
		
		$producto_carrito->delete();
		return json_encode(["success" => true,]);
	}

	public function login(Request $request){
		$user = array(
	        'correo_usuario' => $request->correo_usuario,
	        'password' => $request->clave_usuario
	    );

		if (Auth::attempt($user)){
			$json = [
					"success"=>true,
					"data"=>Auth::user(),
				];
			return json_encode($json);
			//return redirect()->back();
		}
		$json = [
				"success"=> false,
				"data"=>"",
			];
		return json_encode($json);
		//return $request->correo_usuario;
	}

	public function registrar(Request $request){
		$json =[
			'success'=>false,
			'mensaje'=>''
		];

		if (!$request->has('password') || !$request->has('re_password')){
			$json['mensaje'] = 'Debe ingresar ambos campos de contraseña';
            return json_encode($json);
        };

		if ($request->password != $request->re_password){
			$json['mensaje'] = 'Las contraseñas no coincide';
            return json_encode($json);
        };        

        $verificacion = User::where('correo_usuario', $request->correo_usuario)->first();
        if ($verificacion){
			$json['mensaje'] = "Correo ya registrado";
            return json_encode($json);
        };

        $request['password'] = \Hash::make($request['password']);
        $user = User::create($request->all());

        $json['success']=true;
        $json['mensaje']='Registro exitoso';
        return json_encode($json);
	}

	public function forgetPassword(Request $request){
		$json=[
			'success' => false,
			'mensaje' => '',
		];
		if($request->correo){

			$user = User::where('correo_usuario', $request->correo)->first();
			if(!$user){
				$json['mensaje'] = 'Correo no existente';
				return json_encode($json);
			}			
			//$perfil = Perfil::where('id_usuario', $user->id_usuario)->first();
			$password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 10 );
			
			$asunto = "Reestablecer contraseña";
			$plantilla = 'emails.forgot_password';
			$parametros = [
			//			'nombre' => $perfil->fullName(),
						'nombre' => '',
						'password' => $password,
						'contacto_email' => env('CONTACT_EMAIL'),
			];

			HelperController::SendEmail($request->correo, $request->correo, $asunto, $plantilla, $parametros);

			$user->password = \Hash::make($password);
			$user->save();
		}else{
			$json['mensaje'] = 'Introduzca un correo';
			return json_encode($json);
		};
		$json['success'] = true;
		$json['mensaje'] = 'Contraseña enviada a su correo';
		return json_encode($json);
	}


		//Colo
	public function mercadopago(Request $request){

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
        //dd($response);
        $empresa->update(['refresh_token_mercadopago'=>$response->refresh_token,
                                'access_token_mercadopago'=>$response->access_token,
                                'user_id_mercadopago'=>$response->user_id,
                                'fecha_vencimiento_mercadopago'=>$response->expires_in,
                                ]);
        $empresa->save();
		$mp = new MP($response->access_token);
        $mp->sandbox_mode(true);
		$articulos = Carrito::where('id_empresa',$request->id_empresa)
							->where('id_usuario',$request->id_usuario)
							->get();
		
		$preference_data=[	
							'items'=>[],
							'back_urls'=>[
								'success'=>url('comprar/mercadopago/respuesta/'),
								'pending'=>url('comprar/mercadopago/respuesta/'),
								'failure'=>url('comprar/mercadopago/respuesta/'),
							],
							'external_reference'=>$request->id_usuario.",".$request->id_empresa,
							'collector_id'=>intval($response->user_id),
							'notification_url'=>url('/mp/notificaciones'),
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
		return json_encode(['success' => 'true','redirect'=>$preference['response']['sandbox_init_point']]);
	}



	public function listaCompras($id_usuario){
		$compras = (string) Compras::where('habilitado_compra',1)
							->where('id_usuario',$id_usuario)
							->get();
		return json_encode(['success'=>'true',
							'data'=>$compras
						]);
	}


}
