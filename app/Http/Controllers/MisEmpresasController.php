<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;
use DB;
use Redirect;
use Session;
use App\Publicidad;
use Request;
use Illuminate\Pagination\Paginator;

class MisEmpresasController extends Controller {
	/**
	*
	* En este metodo se recibe el rif y se consulta si existe en la tabla empresas, si el rif existe, renderiza la vista
	*donde se listan todas las sucursales asociadas a dicho rif, de lo contrario redirecciona a la vista de registro de empresa
	*
	**/
	public function Index(){
		$id_usuario		= session('id');
		$current_page 	= 1;
		$query	 		= \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_por_usuario','','',$id_usuario));
		$total 			= count($query);
		$count_items	= 5;

		if(\Input::has('page')){
			$current_page = \Input::get('page');
		}	
		
		$data 		= HelperController::Paginador($query, $count_items, $current_page);
		//$paginator 		= new Paginator($query,$count_items, $current_page);
		//$paginator->setPath("/mis-empresas/");
		return View::make('empresa/mostrar_empresa', compact('data'));
	} 
	/* 
		publicaciones de las empresas
	*/
	
	public function PublicacionEmpresa($id_empresa){
		return View::make('empresa/publicacion', compact('id_empresa'));
	} 

	/**
	*
	* Este metodo renderiza la vista para registrar las empresas, ademas de esto, se hacen consultas en la tabla de categorias y
	* estados para poblar los selects.
	*
	**/
	public function Agregar(){
		$categoria = DB::table('t_categoria')->orderBy('nombre_categoria')->get();
		$estados   = DB::table('t_estados')->orderBy('nombre_estado')->get();
		return View::make('empresa/registrar', compact('categoria','estados'));
	} 

	/**
	*
	* aca se recibe via get el id de la empresa y con el se hace una consulta a la Bd para traer todo el registro asociado a ese 
	* id para presentarlo en la vista editar y poder actualizarlo.
	*
	**/

	public function Editar($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)->get()->first();
		if (!$empresa){
			return Redirect::to('/mis-empresas');
		}
		$categoria = DB::table('t_categoria')->orderBy('nombre_categoria')->get();
		$estados   = DB::table('t_estados')->orderBy('nombre_estado')->get();
		if ($empresa->id_usuario != session('id')){
			return Redirect::to('/mis-empresas');
		}
		return View::make('empresa/editar', compact('empresa', 'categoria', 'estados'));
	}

	/**
	*
	* En el metodo actualizar se reciben todos los inputs de la vista editar y se realiza el update en la base de datos, y se renderiza a
	* la vista actualizado.
	*
	**/

	public function Editar_Exitoso(){

		$empresa 			= Empresa::where('id_empresa','=', Input::get('id_empresa'));
		$nombreArchivo 		= Input::get('namefile');

		if ($nombreArchivo){
			$consulta 		= $empresa->first();
			$old_image 		= $consulta->icon_empresa;
			$nombre_carpeta = "empresas";
			$imgController 	= new ImgController();
			$result			= $imgController->create_thumbnails($nombreArchivo, $nombre_carpeta, $old_image);

			if (!$result['success']){
				$data 	 	= (object) ["titulo" => "Error (11121)"];
				$success 	= false;
				$msj 	 	= "No ha sido posible asignar la publicidad a su empresa, intentelo nuevamente y si el problema continua contacte a nuestro soporte a través del correo: soporte@tulocalidad.com.ve";
				$json 	 	= array('success'  => $success,
									  'mensaje' => $msj,
									  'data' 	=> $data);
				return json_encode($json);
			}

			$consulta->icon_empresa  = $result['data']['nombreArchivo'];
			$consulta->save();
			
		}
		$estado = explode(" + ",Input::get('estado'));
		$empresa->update(
			array(
				'nombre_empresa'                => (Input::get('i_nombre')),
				'rif_empresa'                   => (Input::get('i_rif')),
				'direccion_empresa'             => (Input::get('i_direccion')),
				'id_categoria'                  => (Input::get('s_categoria')),
				'correo_empresa'                => (Input::get('i_correo')),
				'id_estado'                     => (int) $estado[0],
				'url_empresa'                   => (Input::get('i_sitio_web')),
				'positionmap_empresa_latitude'  => (Input::get('i_latitud')),
				'positionmap_empresa_longitude' => (Input::get('i_longitud')),
				'telefono_empresa'              => (Input::get('i_telefono')),
				'telefono_2_empresa'            => (Input::get('i_telefono2')),
				'telefono_3_empresa'            => (Input::get('i_telefono3')),
				'telefono_movil_empresa'        => (Input::get('i_celular')),
				'descripcion_empresa'           => (Input::get('i_descripcion')),
				'privacidad_empresa'		 	=> (Input::get('id_privacidad')),
			)
		);

		$success 			= true;
		$msj 	 			= "Su empresa ha sido actualizada exitosamente.";
		$data 				= "";
		$json 	 			= array('success'  => $success,
									  'mensaje' => $msj,
									  'data' 	=> $data);
		return json_encode($json);		
	 	

	}

	/**
	*
	* En el metodo Empresa_procesado se reciben los inputs de la vista registrar empresas, y se insertan en la bd, 
	*
	**/

	public function Agregar_Exitoso(){
		$nombreArchivo 	= Input::get('namefile');
		$rutaOrigen    	= "uploads/temp/".$nombreArchivo;
		$nombre_carpeta = "empresas";

		$imgController 	= new ImgController();
		$result			= $imgController->create_thumbnails($nombreArchivo, $nombre_carpeta);

		if (!$result['success']){
			$data 	 	= (object) ["titulo" => "Error (11111)"];
			$success 	= false;
			$msj 	 	= "No se pudo registrar su empresa, intentelo nuevamente y si el problema continua contacte a nuestro soporte a través del correo: soporte@tulocalidad.com.ve";
			$json 	 	= array('success'  => $success,
								  'mensaje' => $msj,
								  'data' 	=> $data);
			return json_encode($json);
		}

		$id                                     = session('id');
		$empresa                                = new Empresa;
		$empresa->nombre_empresa                = (Input::get('i_nombre')); 	
		$empresa->rif_empresa                   = strtoupper((Input::get('i_rif')));
		$empresa->direccion_empresa             = (Input::get('i_direccion'));
		$empresa->descripcion_empresa           = (Input::get('i_descripcion'));
		$empresa->id_categoria                  = (Input::get('i_categoria'));
		$empresa->correo_empresa                = (Input::get('i_correo'));
		$empresa->id_estado                     = (Input::get('id_estado'));
		$empresa->url_empresa                   = (Input::get('i_sitio_web'));
		$empresa->positionmap_empresa_latitude  = (Input::get('i_latitud'));
		$empresa->positionmap_empresa_longitude = (Input::get('i_longitud'));					
		$empresa->telefono_empresa              = (Input::get('i_telefono'));
		$empresa->telefono_2_empresa            = (Input::get('i_telefono2'));
		$empresa->telefono_3_empresa            = (Input::get('i_telefono3'));
		$empresa->telefono_movil_empresa        = (Input::get('i_celular'));
		$empresa->privacidad_empresa 	        = (Input::get('id_privacidad'));
		$empresa->id_usuario                    = $id;
		$empresa->icon_empresa                  = $result['data']['nombreArchivo'];
		$empresa->save();

		$success = true;
		$msj 	 = "Su empresa ha sido creada exitosamente. Ahora puede asignarle una publicidad a su empresa.";
		$data 	 = "";
		$json 	 = array('success'  => $success,
						  'mensaje' => $msj,
						  'data' 	=> $data);
		return json_encode($json);
	}

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function Agregar_Sucursal($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->orderBy('nombre_categoria')->get();
		$estados   = DB::table('t_estados')->orderBy('nombre_estado')->get();


		return View::make('empresa/nueva_sucursal', compact('empresa', 'categoria', 'estados'));
		
	}

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function Agregar_Sucursal_Exitoso(){
		$rif                                    = (Input::get('i_rif'));
		$empresa                                = new Empresa;
		$empresa->nombre_empresa                = (Input::get('i_nombre')); 	
		$empresa->rif_empresa                   = (Input::get('i_rif'));
		$empresa->direccion_empresa             = (Input::get('i_direccion'));
		$empresa->id_categoria                  = (Input::get('i_categoria'));
		$empresa->correo_empresa                = (Input::get('i_correo'));
		$empresa->id_estado                     = (Input::get('id_estado'));	
		$empresa->url_empresa                   = (Input::get('i_sitio_web'));
		$empresa->positionmap_empresa_latitude  = (Input::get('i_latitud'));
		$empresa->positionmap_empresa_longitude = (Input::get('i_longitud'));				
		$empresa->telefono_empresa              = (Input::get('i_telefono'));
		$empresa->telefono_2_empresa            = (Input::get('i_telefono2'));
		$empresa->telefono_3_empresa            = (Input::get('i_telefono3'));
		$empresa->telefono_movil_empresa        = (Input::get('i_celular'));

		$empresa->save();
	 	return View::make('empresa/creado', compact('rif'));  
	}



	public function DeshabilitarEmpresa($id){
		Empresa::where('id_empresa','=', $id)->delete();
		// Empresa::where('id_empresa','=', $id)->update(
		// 	array(
		// 		'habilitado_empresa' => 0,
		// 	)
		// );

		Publicidad::where('id_empresa','=', $id)->delete();
		// Publicidad::where('id_empresa','=', $id)->update(
		// 	array(
		// 		'habilitado_publicidad' => 0,
		// 	)
		// );

		return \Redirect::to('mis-empresas/');
	}

}

