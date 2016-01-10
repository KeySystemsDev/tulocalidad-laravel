<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model {

	protected $table = 't_carrito';
	protected $fillable = ['id_producto','id_usuario','cantidad_producto_carrito', 'id_empresa'];
	protected $primaryKey = "id_carrito";


	public $cast = ['data_producto' 			=> 'array',
					'imagenes_producto' 		=> 'array',
					'cantidad_producto_carrito' => 'integer',
					'sub_total'					=> 'integer',
					'id_empresa'				=> 'integer',
					'nombre_empresa'			=> 'integer',
					];

	protected $appends = ['data_producto','imagenes_producto', 'sub_total', 'nombre_empresa', 'url_imagen_empresa'];

	public function getDataProductoAttribute(){
        return Producto::find($this->id_producto);
    }

	public function getImagenesProductoAttribute(){
        return Imagen::where('id_producto',$this->id_producto)->get(['nombre_imagen_producto']);
    }


	public function getSubTotalAttribute(){
		return $this->data_producto->precio_producto * $this->cantidad_producto_carrito;
    }


	public function getNombreEmpresaAttribute(){
		//return ['yes'];
		$empresa = Empresa::find($this->id_empresa);
		if ($empresa){
        	return $empresa->nombre_empresa;
		}
		return "sin nombre";
    }

	public function getUrlImagenEmpresaAttribute(){
		//return ['yes'];
		$empresa = Empresa::find($this->id_empresa);
		if ($empresa){
        	return $empresa->url_imagen_empresa;
		}
		return "sin nombre";
    }

}
