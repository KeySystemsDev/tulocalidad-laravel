<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model {
	protected $table = 't_imagen_producto';
	protected $fillable = ['nombre_imagen_producto','id_producto'];
	protected $primaryKey = "id_imagen_producto";


	public $cast = ['nombre_imagen_producto' 	=> 'string'];
}
