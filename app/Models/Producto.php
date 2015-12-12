<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 't_productos';
	protected $primaryKey = "id_producto";
	protected $fillable = ['id_empresa',
							'nombre_producto',
							'id_usuario',
							'precio_producto',
							'descripcion_producto',
							'texto_enriquecido_producto'];

	public $cast = ['id_producto'				=>'integer',
					'id_empresa' 				=>'integer',
					'id_usuario' 				=>'integer',
					'nombre_producto' 			=>'string',
					'precio_producto' 			=>'integer',
					'descripcion_producto' 		=>'string',
					'texto_enriquecido_producto'=>'string',
					'imagenes'					=> 'array'];

	protected $appends = ['imagenes'];

	public function getImagenesAttribute(){
		//return ['yes'];
        return Imagen::where("id_producto", $this->id_producto)->get()->toArray();
    }
}
