<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

		//agregar roles de usuario en esta tabla
	protected $connection = 'permisologia';
	protected $table = 't_perfil';
	protected $primaryKey = "id_perfil";
	protected $fillable = [
						'id_usuario', 
						'nombre_perfil',
						'apellido_perfil',
						'cedula_perfil',
						'sexo_perfil',
						'fecha_nacimiento_perfil',
						'telefono_perfil',
						'url_imagen_perfil',
						'portal_web_perfil',
						'habilitado_perfil'
						];
	public $timestamps = false;

}
