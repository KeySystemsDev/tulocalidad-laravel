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

class MisEmpresasController extends Controller {
	/**
	*
	* En este metodo se recibe el rif y se consulta si existe en la tabla empresas, si el rif existe, renderiza la vista
	*donde se listan todas las sucursales asociadas a dicho rif, de lo contrario redirecciona a la vista de registro de empresa
	*
	**/
	public function Index(){
		$id_usuario	= session('id');
		$consulta 	= \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_por_usuario','','',$id_usuario));
		return View::make('empresa/mostrar_empresa', compact('consulta'));
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
		$categoria = DB::table('t_categoria')->get();
		$estados   = DB::table('t_estados')->get();
		Session::put('registrar','1');
		return View::make('empresa/registrar', compact('categoria','estados'));
	} 

	/**
	*
	* aca se recibe via get el id de la empresa y con el se hace una consulta a la Bd para traer todo el registro asociado a ese 
	* id para presentarlo en la vista editar y poder actualizarlo.
	*
	**/

	public function Editar($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->get();
		$estados   = DB::table('t_estados')->get();
		return View::make('empresa/editar', compact('empresa', 'categoria', 'estados'));
		
	}

	/**
	*
	* En el metodo actualizar se reciben todos los inputs de la vista editar y se realiza el update en la base de datos, y se renderiza a
	* la vista actualizado.
	*
	**/

	public function Editar_Exitoso(){
		Empresa::where('id_empresa','=', Input::get('id_empresa'))->update(
			array(
				'nombre_empresa'                => (Input::get('i_nombre')),
				'rif_empresa'                   => (Input::get('i_rif')),
				'direccion_empresa'             => (Input::get('i_direccion')),
				'id_categoria'                  => (Input::get('s_categoria')),
				'correo_empresa'                => (Input::get('i_correo')),
				'id_estado'                     => (Input::get('id_estado')),
				'url_empresa'                   => (Input::get('i_sitio_web')),
				'positionmap_empresa_latitude'  => (Input::get('i_latitud')),
				'positionmap_empresa_longitude' => (Input::get('i_longitud')),
				'telefono_empresa'              => (Input::get('i_telefono')),
				'telefono_2_empresa'            => (Input::get('i_telefono2')),
				'telefono_3_empresa'            => (Input::get('i_telefono3')),
				'telefono_movil_empresa'        => (Input::get('i_celular')),
			)
		);
		$rif = (Input::get('i_rif'));
	 	return View::make('empresa/actualizado', compact('rif'));

	}

	/**
	*
	* En el metodo Empresa_procesado se reciben los inputs de la vista registrar empresas, y se insertan en la bd, 
	*
	**/

	public function Agregar_Exitoso(){
		if (Session::get('registrar') == 1) {
			Session::put('registrar','2');
				$nombreArchivo                          = e(Input::get('namefile'));
				$rutaOrigen                             = "uploads/temp/".$nombreArchivo;
				$rutaDestino                            = "uploads/empresas/".$nombreArchivo;
				$id                                     = session('id');
				$empresa                                = new Empresa;
				$empresa->nombre_empresa                = e(Input::get('i_nombre')); 	
				$empresa->rif_empresa                   = e(Input::get('i_rif'));
				$empresa->direccion_empresa             = e(Input::get('i_direccion'));
				$empresa->id_categoria                  = e(Input::get('i_categoria'));
				$empresa->correo_empresa                = e(Input::get('i_correo'));
				$empresa->id_estado                     = e(Input::get('id_estado'));
				$empresa->url_empresa                   = e(Input::get('i_sitio_web'));
				$empresa->positionmap_empresa_latitude  = e(Input::get('i_latitud'));
				$empresa->positionmap_empresa_longitude = e(Input::get('i_longitud'));					
				$empresa->telefono_empresa              = e(Input::get('i_telefono'));
				$empresa->telefono_2_empresa            = e(Input::get('i_telefono2'));
				$empresa->telefono_3_empresa            = e(Input::get('i_telefono3'));
				$empresa->telefono_movil_empresa        = e(Input::get('i_celular'));
				$empresa->id_usuario                    = $id;
				$empresa->icon_empresa                  = "/".$rutaDestino;
				$empresa->save();
				rename($rutaOrigen,$rutaDestino);
		}
		return View::make('empresa/creado');
	}

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function Agregar_Sucursal($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->get();
		$estados   = DB::table('t_estados')->get();


		return View::make('empresa/nueva_sucursal', compact('empresa', 'categoria', 'estados'));
		
	}

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function Agregar_Sucursal_Exitoso(){
		$empresa                                = new Empresa;
		$empresa->nombre_empresa                = e(Input::get('i_nombre')); 	
		$empresa->rif_empresa                   = e(Input::get('i_rif'));
		$empresa->direccion_empresa             = e(Input::get('i_direccion'));
		$empresa->id_categoria                  = e(Input::get('i_categoria'));
		$empresa->correo_empresa                = e(Input::get('i_correo'));
		$empresa->id_estado                     = e(Input::get('id_estado'));	
		$empresa->url_empresa                   = e(Input::get('i_sitio_web'));
		$empresa->positionmap_empresa_latitude  = e(Input::get('i_latitud'));
		$empresa->positionmap_empresa_longitude = e(Input::get('i_longitud'));				
		$empresa->telefono_empresa              = e(Input::get('i_telefono'));
		$empresa->telefono_2_empresa            = e(Input::get('i_telefono2'));
		$empresa->telefono_3_empresa            = e(Input::get('i_telefono3'));
		$empresa->telefono_movil_empresa        = e(Input::get('i_celular'));
		$empresa->save();
		$rif                                    = (Input::get('i_rif'));

	 	return View::make('empresa/creado', compact('rif'));  
	}



	public function DeshabilitarEmpresa($id){
		Empresa::where('id_empresa','=', $id)->update(
			array(
				'habilitado_empresa' => 0,
			)
		);

		Publicidad::where('id_empresa','=', $id)->update(
			array(
				'habilitado_publicidad' => 0,
			)
		);

		return \Redirect::to('mis-empresas/');
	}

}

