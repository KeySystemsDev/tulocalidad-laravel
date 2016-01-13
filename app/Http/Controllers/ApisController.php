<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;
use App\Models\Carrito;
use App\User;
use Auth;

class ApisController extends Controller {


	public function __construct (){
		$this->beforeFilter('@filter');
	}


	public function filter(){
		    // header('Access-Control-Allow-Origin: *');
		    // header('Access-Control-Allow-Methods: GET, POST');
		    // header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
		    // header('Access-Control-Allow-Credentials: true');

				   header("Access-Control-Allow-Origin: *");

		  // ALLOW OPTIONS METHOD
		  $headers = [
		         'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
		         'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
		     ];
		  if($request->getMethod() == "OPTIONS") {
		         // The client-side application can set only headers allowed in Access-Control-Allow-Headers
		         return Response::make('OK', 200, $headers);
		     }

		     $response = $next($request);
		     foreach($headers as $key => $value) 
		      $response->header($key, $value);
		  return $response;

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
			$json['mensaje'] = 'Debe ingresar ambos campos de password';
            return json_encode($json);
        };

		if ($request->password != $request->re_password){
			$json['mensaje'] = 'El password no coincide';
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

}
