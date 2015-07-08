<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Redirect;
use App\Usuario;
use App\mercadopago;
class PagoPruebaController extends Controller {

	public function pago(){
		
		$mp = new MP ("7474188025124630", "jl2k9Q3j3BSKNLB86Dg4XejQDEucvnge");
		$preference_data = array(...);
		$preference = $mp->create_preference ($preference_data);
	}

}
