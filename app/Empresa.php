<?php namespace App\ModelApp;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {
	public function __construct(){
		$this->app = DB::connection("mysql");
	}

	public function empresa_consulta(){	
   		$query = $this->_ejecutar_consulta();
		return $query;	
	}

	function _ejecutar_consulta(){  
		$query = DB::select('select * from empresas where id = ?', [1]);
		return $query;
	}
}
?>
