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
						'id_servicio'
						];

	protected $primaryKey = "id_solicitud";

	public $cast = [
					'id_empresa' 					=> 'integer',
					'id_comprador' 					=> 'integer',
					'id_servicio' 					=> 'integer',
					'servicio' 						=> 'array',
					'estatus_solicitud' 			=> 'integer',
					'fecha_finalizado_solicitud'	=> 'date',
					'monto_final_solicitud'			=> 'float',	
					'monto_presupuesto_solicitud'	=> 'float',
					'texto_solicitud'				=> 'string',
					'texto_presupuesto_solicitud'	=> 'string',
					'fecha_vencimiento_solicitud'	=> 'date',
					];

	public $timestamps = false;

	protected $appends = ['servicio'];


	public function getServicioAttribute(){
		return Servicio::find($this->id_servicio);
	}

	public function getFechaCreacionSolicitudAttribute(){
		$date = \Carbon\Carbon::parse($this->attributes['fecha_creacion_solicitud']); 
	  return $date->format('d-m-Y');
	}
	public function getFechaFinalizadoSolicitudAttribute(){
		$date = \Carbon\Carbon::parse($this->attributes['fecha_finalizado_solicitud']); 
	  return $date->format('d-m-Y');
	}
	public function getFechaVencimientoSolicitudAttribute(){
		$date = \Carbon\Carbon::parse($this->attributes['fecha_vencimiento_solicitud']); 
	  return $date->format('d-m-Y');
	}
}
