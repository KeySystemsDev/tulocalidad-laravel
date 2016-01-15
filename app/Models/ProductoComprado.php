<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoComprado extends Model {

	protected $table = 't_productos_comprados';
	protected $primaryKey = "id_producto";
	protected $fillable = [
							'id_empresa',
							'id_compra',
							'cantidad_producto_comprados',
							'precio_unidad',
							'precio_total',
							'nombre_producto',
							'descripcion_producto',
							'primera_imagen'
						];

	public $cast = ['id_producto'				=>'integer',
					'id_empresa' 				=>'integer',
					'id_usuario' 				=>'integer',
					'id_categoria' 				=>'integer',
					'nombre_producto' 			=>'string',
					'precio_producto' 			=>'integer',
					'descripcion_producto' 		=>'string',
					'texto_enriquecido_producto'=>'string',
					'imagenes'					=>'array',
					'cantidad_producto'			=>'integer',
					'primera_imagen'			=>'string',
					'nombre_categoria'			=>'string',
					'id_compra'					=>'integer',
					];

	protected $appends = ['nombre_categoria'];
    
	public function getNombreCategoriaAttribute(){
		//return ['yes'];
		$categoria = CategoriaProductos1::find($this->id_categoria);
		if ($categoria){
        	return $categoria->nombre_categoria_productos1;
		}
		return "sin categorizar";
    }

}
