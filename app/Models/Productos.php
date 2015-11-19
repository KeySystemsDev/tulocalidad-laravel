<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model {


	protected $table = 't_productos';
	protected $fillable = ['id_empresa',
							'id_producto_imagen',
							'nombre_producto',
							'precio_producto',
							'descripcion_producto',
							'texto_enrriquecido_producto'];

}
