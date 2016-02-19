<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model {

	protected $table = 't_solicitudes';
	protected $fillable = [
						'id_empresa',
						'id_comprador',
						'estatus_solicitud',
						'fecha_finalizado_solicitud',
						'monto_final_solicitud',
						'monto_presupuesto_solicitud',
						'texto_solicitud',
						'texto_presupuesto_solicitud',
						'fecha_vencimiento_solicitud',
						];

	protected $primaryKey = "id_solicitud";

	public $cast = [
					'id_vendedor' 					=> 'integer',
					'id_comprador' 					=> 'integer',
					'estatus_solicitud' 			=> 'integer',
					'fecha_finalizado_solicitud'	=> 'date',
					'monto_final_solicitud'			=> 'float',	
					'monto_presupuesto_solicitud'	=> 'float',
					'texto_solicitud'				=> 'string',
					'texto_presupuesto_solicitud'	=> 'string',
					'fecha_vencimiento_solicitud'	=> 'date',
					];

	public $timestamps = false;

	protected $appends = [];

}
