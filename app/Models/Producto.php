<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 't_productos';
	protected $primaryKey = "id_producto";
	protected $fillable = ['id_empresa',
							'id_producto_imagen',
							'nombre_producto',
							'precio_producto',
							'descripcion_producto',
							'texto_enriquecido_producto'];

	public $cast = ['id_empresa' 				=>'integer',
					'id_producto_imagen' 		=>'string',
					'nombre_producto' 			=>'string',
					'precio_producto' 			=>'integer',
					'descripcion_producto' 		=>'string',
					'texto_enriquecido_producto'=>'string'];
}
