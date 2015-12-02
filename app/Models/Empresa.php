<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {


	protected $table = 't_empresas';
	protected $primaryKey = "id_empresa";
	protected $fillable = ['nombre_empresa',
							'correo_empresa',
							'descripcion_empresa',
							'web_empresa',
							'id_estado',
							//direccion
							'municipio_direccion',
							'parroquia_direccion',
							'urbanizacion_direccion',
							'calle_avenida_direccion',
							'casa_apto_direccion',
							'piso_direccion',

							'rif_empresa', //falta en db
							'url_imagen'];

	public $cast = ['nombre_empresa' 		=>'string',
					'correo_empresa' 		=>'string',
					'descripcion_empresa' 	=> 'string',
					'web_empresa' 			=> 'string',
					'id_estado' 			=> 'integer',
					'url_imagen' 			=> 'integer',
					//direccion
					'municipio_direccion' 	=> 'string',
					'parroquia_direccion'	=> 'string',
					'urbanizacion_direccion'=> 'string',
					'calle_avenida_direccion'=> 'string',
					'casa_apto_direccion' 	=> 'string',
					'piso_direccion' 		=> 'string',
					'rif_empresa' 			=> 'string', //falta en db
					'logo_empresa' 			=> 'string'];

}
