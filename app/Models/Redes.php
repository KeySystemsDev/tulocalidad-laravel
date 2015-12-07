<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redes extends Model {
	protected $table = 't_redes_sociales';
	protected $fillable = ['nombre_red_social',
							'icon_red_social',
							'url_red_social',
							'share_url_red_social',
							'habilitado_red_social'];

	protected $primaryKey = "id_red_social";

	public $timestamps = false;

	public $cast = ['nombre_red_social' 			=> 'string',
					'icon_red_social' 				=> 'string',
					'url_red_social' 				=> 'string',
					'share_url_red_social'			=> 'string',
					'habilitado_red_social'			=> 'integer',
					];
}
