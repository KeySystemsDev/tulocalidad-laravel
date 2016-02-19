<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioFavorito extends Model {

	protected $table = 't_servicio_favorito';
	protected $primaryKey = "id_servicio_favorito";
	protected $fillable = [
							'id_usuario',
							'id_servicio',
							
						];

	public $cast = ['id_servicio'				=> 'integer',
					'id_usuario'				=> 'integer',
					];

}
