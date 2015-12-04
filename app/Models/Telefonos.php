<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefonos extends Model {
	protected $table = 't_telefonos';
	protected $fillable = ['numero_telefono','id_empresa'];
	protected $primaryKey = "id_telefono";
	public $timestamps = false;
	public $cast = ['numero_telefono' 	=> 'integer'];
}
