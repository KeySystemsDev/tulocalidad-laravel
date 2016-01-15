<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model {

	protected $table = 't_compras';
	protected $fillable = [
							'id_compra',
							'tipo_pago_compra',
							'identificador_pago_compra',
							'precio_total_compra',
							'estatus_compra',
							'id_usuario',
							'id_empresa',
							'habilitado_compra',
							];

	protected $primaryKey = "id_compra";

	public $cast = [
					'id_compra' 				=> 'integer',
					'tipo_pago_compra' 			=> 'string',
					'identificador_pago_compra' => 'integer',
					'precio_total_compra' 		=> 'float',
					'estatus_compra' 			=> 'string',
					'id_usuario' 				=> 'integer',
					'id_empresa' 				=> 'integer',
					'habilitado_compra' 		=> 'integer',
					];

	protected $appends = ['productos_comprados','factura'];

	public function getProductosCompradosAttribute(){
        return ProductoComprado::where('id_compra',$this->id_compra)->get();
    }

	public function getFacturaAttribute(){
        return Factura::where('id_compra',$this->id_compra)->get();
    }
}