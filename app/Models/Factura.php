<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model {

	protected $table = 't_facturas';
	protected $fillable = [
							'id_factura',
							'identificador_factura',
							'nombre_usuario',
							'correo_usuario',
							'telefono_usuario',
							'rif_usuario',
							'direccion_usuario',
							];

	protected $primaryKey = "id_factura";
	public $timestamps = false;
	public $cast = [
					'id_factura' 			=> 'integer',
					'identificador_factura' => 'string',
					'nombre_usuario' 		=> 'string',
					'correo_usuario'		=> 'string',
					'telefono_usuario'		=> 'string',
					'rif_usuario'			=> 'string',
					'direccion_usuario'		=> 'string',
				];

	//protected $appends = ['data_producto','imagenes_producto', 'sub_total', 'nombre_empresa', 'url_imagen_empresa'];

//	public function getDataProductoAttribute(){
//        return Producto::find($this->id_producto);
//    }

}
