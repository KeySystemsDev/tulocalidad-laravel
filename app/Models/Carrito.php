<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {

	protected $table = 't_carrito';
	protected $fillable = ['id_producto','id_usuario'];
	protected $primaryKey = "id_carrito";


	public $cast = ['data_producto' 			=> 'array',
					'imagenes_producto' 		=> 'array',
					];

	protected $appends = ['data_producto','imagenes_producto'];

	public function getDataProductoAttribute(){
        return Producto::find($this->id_producto);
    }

	public function getImagenesProductoAttribute(){
        return Imagen::where('id_producto',$this->id_producto)->get(['nombre_imagen_producto']);
    }

}