<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model {

	protected $table = 't_facturas';
	protected $fillable = [
							'id_factura',
							'identificador_factura',
							'id_compra',
							];

	protected $primaryKey = "id_factura";

	public $cast = [
					'id_factura' 			=> 'integer',
					'identificador_factura' => 'string',
					'id_compra'				=> 'integer',
				];

	//protected $appends = ['data_producto','imagenes_producto', 'sub_total', 'nombre_empresa', 'url_imagen_empresa'];

//	public function getDataProductoAttribute(){
//        return Producto::find($this->id_producto);
//    }

}
