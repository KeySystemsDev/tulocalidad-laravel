<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;
use DB;
use Redirect;

class EmpresaController extends Controller {

	public function ActionIndex(){
		return View::make('empresa/consulta_rif');   
	}
//********************************************************************************************
	public function ActionConsulta(){
		$rif      = (Input::get('v'));
		$consulta = Empresa::where('rif_empresa','=', $rif)-> get();
			
		if(count($consulta) == 0){
			return Redirect::to('empresa/registrar');   
		}else{
			return View::make('empresa/mostrar_empresa', array('consulta' => $consulta));
		}
	} 
//********************************************************************************************
	public function ActionRegistrar(){
			$categoria = DB::table('t_categoria')->get();
			$estados   = DB::table('t_estados')->get();
			return View::make('empresa/registrar', compact('categoria','estados'));
	} 
//********************************************************************************************	
	public function ActionEditar($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->get();
		$estados   = DB::table('t_estados')->get();
		return View::make('empresa/editar', compact('empresa', 'categoria', 'estados'));
		
	}
//********************************************************************************************
	public function ActionActualizar(){
		Empresa::where('id_empresa','=', Input::get('id_empresa'))->update(
			array(
				'nombre_empresa'         => (Input::get('i_nombre')),
				'rif_empresa'            => (Input::get('i_rif')),
				'direccion_empresa'      => (Input::get('i_direccion')),
				'id_categoria'           => (Input::get('s_categoria')),
				'correo_empresa'         => (Input::get('i_correo')),
				'id_estado'              => (Input::get('s_estados')),
				'url_empresa'            => (Input::get('i_sitio_web')),			
				'telefono_empresa'       => (Input::get('i_telefono')),
				'telefono_2_empresa'     => (Input::get('i_telefono2')),
				'telefono_3_empresa'     => (Input::get('i_telefono3')),
				'telefono_movil_empresa' => (Input::get('i_celular')),
			)
		);
		$rif = (Input::get('i_rif'));
	 	return View::make('empresa/actualizado', compact('rif'));

	}
//********************************************************************************************
	public function ActionEmpresa_procesado(){
		$empresa = new Empresa;
		$empresa->nombre_empresa                = e(Input::get('i_nombre')); 	
		$empresa->rif_empresa                   = e(Input::get('i_rif'));
		$empresa->direccion_empresa             = e(Input::get('i_direccion'));
		$empresa->id_categoria                  = e(Input::get('i_categoria'));
		$empresa->correo_empresa                = e(Input::get('i_correo'));
		$empresa->id_estado                     = e(Input::get('i_estados'));
		$empresa->url_empresa                   = e(Input::get('i_sitio_web'));
		$empresa->positionmap_empresa_latitude  = e(Input::get('i_latitud'));
		$empresa->positionmap_empresa_longitude = e(Input::get('i_longitud'));					
		$empresa->telefono_empresa              = e(Input::get('i_telefono'));
		$empresa->telefono_2_empresa            = e(Input::get('i_telefono2'));
		$empresa->telefono_3_empresa            = e(Input::get('i_telefono3'));
		$empresa->telefono_movil_empresa        = e(Input::get('i_celular'));
		$empresa->save();
		$rif = (Input::get('i_rif'));
	 	return View::make('empresa/creado', compact('rif'));   
	}
//********************************************************************************************
	public function ActionSucursal($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->get();
		$estados   = DB::table('t_estados')->get();


		return View::make('empresa/nueva_sucursal', compact('empresa', 'categoria', 'estados'));
		
	}
//********************************************************************************************
	public function ActionSucursal_procesado(){
		$empresa                         = new Empresa;
		$empresa->nombre_empresa         = e(Input::get('i_nombre')); 	
		$empresa->rif_empresa            = e(Input::get('i_rif'));
		$empresa->direccion_empresa      = e(Input::get('i_direccion'));
		$empresa->id_categoria           = e(Input::get('i_categoria'));
		$empresa->correo_empresa         = e(Input::get('i_correo'));
		$empresa->id_estado              = e(Input::get('i_estados'));	
		$empresa->url_empresa            = e(Input::get('i_sitio_web'));				
		$empresa->telefono_empresa       = e(Input::get('i_telefono'));
		$empresa->telefono_2_empresa     = e(Input::get('i_telefono2'));
		$empresa->telefono_3_empresa     = e(Input::get('i_telefono3'));
		$empresa->telefono_movil_empresa = e(Input::get('i_celular'));
		$empresa->save();
		$rif                             = (Input::get('i_rif'));
	 	return View::make('empresa/creado', compact('rif'));  
	}
//********************************************************************************************
	public function ActionConsulta_estado(){
		$rif = (Input::get('v'));
		$consulta = Empresa::where('rif_empresa','=', $rif)-> get();
			
		if(count($consulta) == 0){
			$categoria = DB::table('t_categoria')->get();
			$estados   = DB::table('t_estados')->get();
			return View::make('empresa/registrar', compact('categoria','estados')); 	     
		}else{
			return View::make('empresa/mostrar_empresa', array('consulta' => $consulta));
		}
	} 
}

?>