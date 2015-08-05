<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract{

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $connection = 'permiso';
	protected $table      = 't_usuario';
	public $timestamps    = false;
	protected $primaryKey = 'id_usuario';

}

	
