<?php namespace App;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	protected $table='t_empresas';
	public $timestamps = false;
	protected $primaryKey = 'id_empresa';

}
