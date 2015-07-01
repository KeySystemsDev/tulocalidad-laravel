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

class EmpresaController extends Controller {

	/**
	*
	* Renderiza la vista para consultar si el rif existe o no
	*
	**/

	public function ActionIndex(){
		return View::make('empresa/consulta_rif');   
	}

	/**
	*
	* En este metodo se recibe el rif y se consulta si existe en la tabla empresas, si el rif existe, renderiza la vista
	*donde se listan todas las sucursales asociadas a dicho rif, de lo contrario redirecciona a la vista de registro de empresa
	*
	**/

	public function ActionConsulta(){
		$rif      = (Input::get('v'));
		$consulta = Empresa::where('rif_empresa','=', $rif)-> get();
			
		if(count($consulta) == 0){
			return Redirect::to('empresa/registrar');   
		}else{
			return View::make('empresa/mostrar_empresa', array('consulta' => $consulta));
		}
	} 

	/**
	*
	* Este metodo renderiza la vista para registrar las empresas, ademas de esto, se hacen consultas en la tabla de categorias y
	*estados para poblar los selects.
	*
	**/
	
	public function ActionRegistrar(){
			$categoria = DB::table('t_categoria')->get();
			$estados   = DB::table('t_estados')->get();
			Session::put('registrar','1');
			return View::make('empresa/registrar', compact('categoria','estados'));
	} 

	/**
	*
	* aca se recibe via get el id de la empresa y con el se hace una consulta a la Bd para traer todo el registro asociado a ese 
	*id para presentarlo en la vista editar y poder actualizarlo.
	*
	**/

	public function ActionEditar($id_empresa){
		$empresa   = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->get();
		$estados   = DB::table('t_estados')->get();
		return View::make('empresa/editar', compact('empresa', 'categoria', 'estados'));
		
	}

	/**
	*
	* En el metodo actualizar se reciben todos los inputs de la vista editar y se realiza el update en la base de datos, y se renderiza a
	*la vista actualizado.
	*
	**/

	public function ActionActualizar(){
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

	public function ActionEmpresa_procesado(){
		if (Session::get('registrar') == 1) {
			Session::put('registrar','2');
				$nombreArchivo = e(Input::get('namefile'));
				$nombreArchivo = e(Input::get('namefile'));
				$rutaOrigen    = "uploads/temp/".$nombreArchivo;
				$rutaDestino   = "uploads/empresas/".$nombreArchivo;


				$empresa = new Empresa;
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
				$empresa->icon_empresa					= "/".$rutaDestino;
														// se coloca la ruta con la / para el uso de la redireccion
				$empresa->save();

				rename($rutaOrigen,$rutaDestino);

				$rif = (Input::get('i_rif'));

		}
		return View::make('empresa/creado', compact('rif'));
	}

	/**
	*
	* Coloca que hace este metodo
	*
	**/

	public function ActionSucursal($id_empresa){
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

	public function ActionSucursal_procesado(){
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

	/**
	*
	* Coloca que hace este metodo
	*
	**/

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

	public function ActionAgregar_Publicidad($id_empresa){
		$nombre  = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		return View::make('empresa/agregar_publicidad',compact('nombre'));
	}

	public function ActionGuardar_Publicidad(){
		// $path                               ='uploads/publicidad';
		// $archivo                            =Input::file('i_publicidad');
		// $nombre                             =Input::file('i_publicidad')->getClientOriginalName();
		// $alojar                             =$archivo->move($path, $nombre);
		// $url                                = Request::path();

		$nombreArchivo = e(Input::get('namefile'));
		$nombreArchivo = e(Input::get('namefile'));
		$rutaOrigen    = "uploads/temp/".$nombreArchivo;
		//agregar en la ruta destino la direccion de la carpeta del usuario
		$rutaDestino   = "uploads/publicidades/".$nombreArchivo;


		$publicidad                         = new Publicidad;
		$publicidad->titulo_publicidad      = Input::get('i_titulo');
		$publicidad->descripcion_publicidad = Input::get('i_descripcion');
		$publicidad->id_empresa 			= Input::get('id_empresa');
		$publicidad->url_imagen_publicidad  = "/".$rutaDestino;
											// se coloca la ruta con la / para el uso de la redireccion
		$publicidad->save();

		rename($rutaOrigen,$rutaDestino);
		echo "se ha guardado exitosamente ".$publicidad->url_imagen_publicidad;
		//return View::make('empresa/agregar_publicidad',compact('nombre'));
	}

	public function ActionListar_Publicidad(){
		return View::make('empresa/listar_publicidad');
	}	

}

