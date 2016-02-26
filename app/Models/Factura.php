<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

	protected $table = 't_facturas';
	protected $fillable = [
							'id_factura',
							'identificador_factura',
							'a_nombre_de',
							'correo_electronico',
							'telefono',
							'cedula_rif',
							'direccion_fiscal',
							];

	protected $primaryKey = "id_factura";
	public $timestamps = false;
	public $cast = [

					'id_factura'=> 'integer',
					'identificador_factura'=> 'string',
					'a_nombre_de'=> 'string',
					'correo_electronico'=> 'string',
					'telefono'=> 'string',
					'cedula_rif'=> 'string',
					'direccion_fiscal'=> 'string',
				];

	//protected $appends = ['data_producto','imagenes_producto', 'sub_total', 'nombre_empresa', 'url_imagen_empresa'];

//	public function getDataProductoAttribute(){
//        return Producto::find($this->id_producto);
//    }

}
