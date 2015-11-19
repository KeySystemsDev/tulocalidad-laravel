<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model {


	protected $table = 't_empresas';
	protected $fillable = ['nombre_empresa',
							'correo_empresa',
							'descripcion_empresa',
							'web_empresa',
							
							'rif_empresa' //falta en db
							'logo_empresa'];

}
