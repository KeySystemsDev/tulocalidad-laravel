<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 't_productos';
	protected $primaryKey = "id_producto";
	protected $fillable = ['id_empresa',
							'nombre_producto',
							'id_usuario',
							'id_categoria',
							'precio_producto',
							'descripcion_producto',
							'texto_enriquecido_producto',
							'cantidad_producto',
							'estatus_producto',
							'habilitado_producto'];

	public $cast = ['id_producto'				=>'integer',
					'id_empresa' 				=>'integer',
					'id_usuario' 				=>'integer',
					'id_categoria' 				=>'integer',
					'nombre_producto' 			=>'string',
					'precio_producto' 			=>'integer',
					'descripcion_producto' 		=>'string',
					'texto_enriquecido_producto'=>'string',
					'imagenes'					=> 'array',
					'cantidad_producto'			=> 'integer',
					'primera_imagen'			=> 'string',
					'nombre_categoria'			=> 'string',
					];

	protected $appends = ['imagenes','primera_imagen','nombre_categoria'];

	public function getImagenesAttribute(){
		//return ['yes'];
        return Imagen::where("id_producto", $this->id_producto)->get()->toArray();
    }

	public function getPrimeraImagenAttribute(){
		//return ['yes'];
        return Imagen::where("id_producto", $this->id_producto)->first();
    }
    
	public function getNombreCategoriaAttribute(){
		//return ['yes'];
		$categoria = CategoriaProductos1::find($this->id_categoria);
		if ($categoria){
        	return $categoria->nombre_categoria_productos1;
		}
		return "sin categorizar";
    }
}
