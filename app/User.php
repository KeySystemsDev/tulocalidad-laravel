<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

	use Authenticatable,Authorizable, CanResetPassword;

		//agregar roles de usuario en esta tabla
	protected $connection = 'permisologia';
	protected $table = 't_usuario';
	protected $primaryKey = "id_usuario";
	protected $fillable = ['correo_usuario', 'password','id_permisologia'];
	protected $hidden = ['password', 'remember_token'];
	public $timestamps = false;


	public function getPerfil(){
		$perfil = Perfil::where('id_usuario',$this->id_usuario)->first();
		return $perfil;
	}

	public function getFullName(){
		return Perfil::where('id_usuario',$this->id_usuario)->first()->fullName();
	}


	public function isAdmin(){
		$permisologia = Permisologia::find($this->id_permisologia);
		if ($permisologia){
			return $permisologia->identificador_permisologia == 'admin';
		}
		return false;
	}

	public function isSocio(){
		$permisologia = Permisologia::find($this->id_permisologia);
		if ($permisologia){
			return $permisologia->identificador_permisologia == 'socio';
		}
		return false;
	}
	
	public function getSocioExcepcions(){
		return Excepciones::where('id_usuario', $this->id_usuario)->get()->pluck('modulo_excepcion')->toArray();
	}




	public function isTrabajador(){
		# code...
	}
}
