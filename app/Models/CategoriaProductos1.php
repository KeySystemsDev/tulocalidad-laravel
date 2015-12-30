<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaProductos1 extends Model {

	protected $table = 't_categoria_productos1';
	protected $fillable = ['id_categoria_productos1',
							'nombre_categoria_productos1',
							'habilitado_categoria_productos1'];
	protected $primaryKey = "id_categoria_productos1";


	public $cast = ['nombre_categoria_productos1' 	=> 'string',
					];
 
}
