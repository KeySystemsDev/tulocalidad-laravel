<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model {

	protected $table = 't_tags';
	protected $fillable = [
							'nombre_tag',
							'habilitado_tag'
							];


}
