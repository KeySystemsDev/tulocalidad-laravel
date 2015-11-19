<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model {

	protected $table = 't_servicios';
	protected $fillable = ['id_empresa',
							'titulo_servicio',
							'descripcion_servicio',
							'id_imagen',
							'id_servicios_tags'
							];


}
