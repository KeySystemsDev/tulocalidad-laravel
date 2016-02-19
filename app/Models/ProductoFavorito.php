<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoFavorito extends Model {

	protected $table = 't_productos_favorito';
	protected $primaryKey = "id_producto_favorito";
	protected $fillable = [
							'id_usuario',
							'id_producto',
							
						];

	public $cast = ['id_producto'				=> 'integer',
					'id_usuario'				=> 'integer',
					];

	protected $appends =['producto'];

	public function getProductoAttribute(){
		return Producto::find($this->id_producto);
	};
}
