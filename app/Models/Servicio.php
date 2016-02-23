<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Servicio extends Model {

	protected $table = 't_servicios';
	protected $primaryKey = "id_servicio";
	protected $fillable = ['id_empresa',
							'id_usuario',
							'id_categoria',
							'nombre_servicio',
							'descripcion_servicio',
							'precio_servicio',
							'url_imagen_servicio',
							'habilitado_servicio',
							'id_servicios_tags'
							];

	public $cast = ['id_empresa' 			=>'integer',
					'nombre_servicio' 		=>'string',
					'id_usuario' 			=>'integer',
					'id_categoria' 			=>'integer',
					'descripcion_servicio' 	=>'string',
					'url_imagen_servicio' 	=>'string',
					'nombre_categoria' 		=>'string',
					'precio_servicio' 		=>'integer',];

	protected $appends = ['nombre_categoria','favorito'];

	public function getNombreCategoriaAttribute(){

		$categoria = CategoriaServicios1::find($this->id_categoria);
		if ($categoria){
        	return $categoria->nombre_categoria_servicios1;
		}
		return "sin categorizar";
    }

	public function getFavoritoAttribute(){
		//return ['yes'];
        if (ServicioFavorito::where('id_servicio',$this->id_servicio)
        						->where('id_usuario',Auth::user()->id_usuario)
        						->first() ){
        	return true;
        }
        else{
        	return false;
        }
    }

}
