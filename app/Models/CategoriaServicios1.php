<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaServicios1 extends Model {

	protected $table = 't_categoria_servicios1';
	protected $fillable = ['id_categoria_servicios1',
							'nombre_categoria_servicios1',
							'habilitado_categoria_servicios1'];
	protected $primaryKey = "id_categoria_servicios1";


	public $cast = ['nombre_categoria_servicios1' 	=> 'string',
					];
 
}
