<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model {

	protected $table = 't_servicios';
	protected $primaryKey = "id_servicio";
	protected $fillable = ['id_empresa',
							'nombre_servicio',
							'descripcion_servicio',
							'precio_servicio',
							'id_imagen',
							'id_servicios_tags'
							];

	public $cast = ['id_empresa' 			=>'integer',
					'nombre_servicio' 		=>'string',
					'descripcion_servicio' 	=>'string',
					'precio_servicio' 		=>'integer',];

}
