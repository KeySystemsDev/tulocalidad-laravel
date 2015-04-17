<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Prueba extends Model {

	protected $table='t_empresas';
	public $timestamps = false;
	protected $primaryKey = 'id_estado';
	
	public static function p_consulta_estado($consulta_estado) {

         return DB::statement('call p_consulta_estado(?)',array($consulta_estado));
    }


}	
?>
Prueba 