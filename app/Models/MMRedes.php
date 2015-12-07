<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MMRedes extends Model {
	protected $table = 't_redes';
	protected $fillable = ['id_empresa',
							'id_red_social',
							'identificador_red',
							'habilitado_red'];

	protected $primaryKey = "id_red";


	public $cast = ['id_empresa' 			=> 'integer',
					'id_red_social'		 	=> 'integer',
					'identificador_red' 	=> 'string',
					'habilitado_red'		=> 'integer',
					];
}
