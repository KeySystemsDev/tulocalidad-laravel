<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Carrito;
use App\Models\Perfil;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

	use Authenticatable,Authorizable, CanResetPassword;

		//agregar roles de usuario en esta tabla
	protected $connection = 'permisologia';
	protected $table = 't_usuario';
	protected $primaryKey = "id_usuario";
	protected $fillable = ['correo_usuario', 'password','id_permisologia', 'costo_carrito'];
	protected $hidden = ['password', 'remember_token'];
	public $timestamps = false;


	public $cast = [
					'id_usuario'			=> 'integer',
					'correo_usuario'		=> 'string',
					'numero_articulos'		=> 'integer',
					'costo_carrito'			=> 'float',
					'articulos'				=> 'array',
					'perfil'				=> 'array',
					];

	protected $appends = ['numero_articulos','articulos', 'costo_carrito','perfil', 'full_name'];


	public function getPerfilAttribute(){
		return Perfil::where('id_usuario',$this->id_usuario)->first();
	}	

	public function getFullNameAttribute(){
		$perfil = Perfil::where('id_usuario',$this->id_usuario)->first();
		if ($perfil){
			return $perfil->nombre_perfil + " " + $perfil->apellido_perfil;
		}
		return $this->correo_usuario;
	}	

	public function getNumeroArticulosAttribute(){
		$cantidad_articulos = Carrito::where('id_usuario',$this->id_usuario)->count();
		//$articulos = Carrito::where('id_usuario',$this->id_usuario)->take(3)->get();
		return $cantidad_articulos;
	}

	public function getArticulosAttribute(){
		//$cantidad_articulos = Carrito::where('id_usuario',$this->id_usuario)->count();
		$articulos = Carrito::where('id_usuario',$this->id_usuario)->orderBy('id_carrito','desc')->take(3)->get();
		return $articulos;
	}

	public function getCostoCarritoAttribute(){
		//$cantidad_articulos = Carrito::where('id_usuario',$this->id_usuario)->count();
		$articulos = Carrito::where('id_usuario',$this->id_usuario)->get();
		$precio = 0;
		foreach ($this->articulos as $articulo ) {
			$precio += $articulo->cantidad_producto_carrito * $articulo->data_producto->precio_producto;
		};
		return $precio;
	}


}
