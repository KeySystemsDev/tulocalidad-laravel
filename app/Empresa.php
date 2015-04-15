<?php namespace App\ModelApp;
//use Illuminate\Database\Eloquent\Model;

class Empresa extends Eloquent {

	protected $table='empresas';

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
	public static function web($filt) {
   		$filtro_empresas = DB::table('empresas.empresa_direccion')->where('filter',$filt)->id(1)->get();
   		return $filtro_empresas;
	}
	public static function all()
	{
		return DB::query('SELECT * FROM users');
	}
}
?>
