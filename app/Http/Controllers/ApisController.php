<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;
use App\Models\Empresa;

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

		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

	public function getDetalleProducto($producto){
		$model = Producto::find($producto);

		return json_encode([
						"success" => true,
						"data" => $model,
						]);
	}

}
