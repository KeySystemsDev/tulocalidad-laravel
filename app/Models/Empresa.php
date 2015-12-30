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
							'rif_empresa',
							'latitud_empresa',
							'longitud_empresa',
							'url_imagen_empresa',
							'direccion_empresa',
							'habilitado_empresa'];

	public $cast = ['nombre_empresa' 		=> 'string',
					'correo_empresa' 		=> 'string',
					'rif_empresa' 			=> 'string',
					'id_usuario' 			=> 'integer',
					'descripcion_empresa' 	=> 'string',
					'direccion_empresa' 	=> 'string',
					'web_empresa' 			=> 'string',
					'id_estado' 			=> 'integer',
					'url_imagen_empresa'	=> 'string',
					'logo_empresa' 			=> 'string',
					'latitud_empresa'		=> 'integer',
					'longitud_empresa'		=> 'integer',
					'nombre_estado'			=> 'string',
					'telefonos'				=> 'array',
					'redes'					=> 'array',

					];

	protected $appends = ['nombre_estado','telefonos', 'redes'];

	public function getNombreEstadoAttribute(){
		$estado = Estado::find($this->id_estado);
		if ($estado){ return $estado->nombre_estado;}
        return "error de validacion";
    }

   	public function getTelefonosAttribute(){
        return Telefonos::where('id_empresa',$this->id_empresa)->get();
    }

   	public function getRedesAttribute(){
        return MMRedes::where('id_empresa',$this->id_empresa)->get();
    }

}
