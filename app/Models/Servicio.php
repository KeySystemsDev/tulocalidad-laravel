<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model {

	protected $table = 't_servicios';
	protected $primaryKey = "id_servicio";
	protected $fillable = ['id_empresa',
							'id_usuario',
							'nombre_servicio',
							'descripcion_servicio',
							'precio_servicio',
							'url_imagen_servicio',
							'id_servicios_tags'
							];

	public $cast = ['id_empresa' 			=>'integer',
					'nombre_servicio' 		=>'string',
					'id_usuario' 			=>'integer',
					'descripcion_servicio' 	=>'string',
					'url_imagen_servicio' 	=>'string',
					'precio_servicio' 		=>'integer',];

}
