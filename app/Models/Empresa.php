<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {


	protected $table = 't_empresas';
	protected $primaryKey = "id_empresa";
	protected $fillable = ['nombre_empresa',
							'correo_empresa',
							'id_usuario',
							'descripcion_empresa',
							'web_empresa',
							'id_estado',
							'municipio_direccion',
							'parroquia_direccion',
							'urbanizacion_direccion',
							'calle_avenida_direccion',
							'casa_apto_direccion',
							'piso_direccion',
							'rif_empresa',
							'latitud_empresa',
							'longitud_empresa',
							'url_imagen_empresa'];

	public $cast = ['nombre_empresa' 		=> 'string',
					'correo_empresa' 		=> 'string',
					'id_usuario' 			=> 'integer',
					'descripcion_empresa' 	=> 'string',
					'web_empresa' 			=> 'string',
					'id_estado' 			=> 'integer',
					'url_imagen_empresa'	=> 'string',
					//direccion
					'municipio_direccion' 	=> 'string',
					'parroquia_direccion'	=> 'string',
					'urbanizacion_direccion'=> 'string',
					'calle_avenida_direccion'=> 'string',
					'casa_apto_direccion' 	=> 'string',
					'piso_direccion' 		=> 'string',
					'piso_direccion' 		=> 'string',
					'rif_empresa' 			=> 'string', //falta en db
					'logo_empresa' 			=> 'string',
					'latitud_empresa'		=> 'integer',
					'longitud_empresa'		=> 'integer',
					'nombre_estado'			=> 'string',
					'telefonos'				=> 'array',
					'redes'					=> 'array',

					];

	protected $appends = ['nombre_estado','telefonos', 'redes'];

	public function getNombreEstadoAttribute(){
        return Estado::find($this->id_estado)->nombre_estado;
    }

   	public function getTelefonosAttribute(){
        return Telefonos::where('id_empresa',$this->id_empresa)->get();
    }

   	public function getRedesAttribute(){
        return MMRedes::where('id_empresa',$this->id_empresa)->get();
    }

}
