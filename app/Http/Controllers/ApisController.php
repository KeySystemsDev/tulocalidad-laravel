<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Imagen;

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
		$productos = Producto::where('id_empresa', $empresa)->get()->toArray();

		return json_encode([
						"success" => true,
						"data" => $productos,
						]);
	}

	public function getServicios($empresa){
		$servicios = Servicio::where('id_empresa', $empresa)->get()->toArray();

		return json_encode([
						"success" => true,
						"data" => $servicios,
						]);
	}

}
