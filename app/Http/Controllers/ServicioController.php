<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Publicidad;
use App\Empresa;
use App\Categoria;
use App\Estado;
use Redirect;

class ServicioController extends Controller {

	public function Index(){
		$current_page 	= 1;
		$query	 		= \DB::select('CALL p_t_publicidad(?,?,?,?,?,?)',array('listado_publicidades','','','','',''));
		$total 			= count($query);
		$count_items	= 12;

		if(\Input::has('page')){
			$current_page = \Input::get('page');
		}	
		
		$data 		= HelperController::Paginador($query, $count_items, $current_page);

		return view('servicio/recomendados',compact('data'));
	}

	public function Todo(){
		$estados   = DB::table('t_estados')->get();
		return view('servicio/estados', compact('estados'));
	}


	public function Estado($id_estado){
		$estado     = Estado::where('nombre_estado','=',$id_estado)->first();
		if ($estado == null){
			return view('servicio/sin_resultado');
		}		
		$categorias = \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_categoria_por_estado','',$estado->id_estado,''));
		$i = round(count($categorias) / 3);
		return view('servicio/categorias', compact('id_estado','categorias', 'i'));
	}


	public function Categoria($id_estado, $id_categoria){
		$categoria 	= Categoria::where('nombre_categoria','=',$id_categoria)->first();
		if ($categoria == null){
			return view('servicio/sin_resultado');
		}
		$estado 	= Estado::where('nombre_estado','=',$id_estado)->first();
		if ($estado == null){
			return view('servicio/sin_resultado');
		}
		$empresas 	= Empresa::where('id_estado','=',$estado->id_estado)
							 ->where('id_categoria','=',$categoria->id_categoria)
							 ->get()
							 ->all();
							 

		if( !$empresas or count($empresas)==0 ){
			return view('servicio/sin_resultado');
		}

		$current_page 	= 1;

		$total 			= count($empresas);
		$count_items	= 8;

		if(\Input::has('page')){
			$current_page = \Input::get('page');
		}	
		
		$data 		= HelperController::Paginador($empresas, $count_items, $current_page);


		return view('servicio/empresas', compact('id_estado', 'id_categoria','data' ));
	}


	public function Empresa($id_empresa){
		$empresa 		= Empresa::where('id_empresa',$id_empresa)->first();

		$empresas 		= Empresa::where('id_empresa',$id_empresa)->update(
										array(
											'visitas_empresas' => $empresa->visitas_empresa+1,
											)
									);
		
		if (!$empresa){
			return view('servicio/sin_resultado');
		}

		$estado    = Estado::where('id_estado','=',$empresa->id_estado)->first()->nombre_estado;
		$categoria = Categoria::where('id_categoria','=',$empresa->id_categoria)->first()->nombre_categoria;

		$publicidades = Publicidad::where('id_empresa', $id_empresa)->get()->all();

		return view('servicio/empresa_detalle', compact('empresa','estado','categoria','publicidades'));
	}


	public function Publicidad($id_publicidad){
		$publicidades 	= Publicidad::where('id_publicidad','=',$id_publicidad);
		$publicidad 	= $publicidades->first();
		if (!$publicidad){
			return view('servicio/sin_resultado');
		};
		$publicidades->update(
				array(
					'visitas_publicidad' => $publicidad->visitas_publicidad+1,
					)
				);
		$recomendados = Publicidad::where('id_empresa','=',$publicidad->id_empresa)->get();

		return view('servicio/recomendados_detalle', compact('publicidad', 'recomendados'));
	}


	public function VerificarRif(){
		$data 		= array();
		$success 	= true;
		$mensaje 	= "";
		$repetidos 	= Empresa::where('rif_empresa', '=', \Input::get('rif'))->first(); 
		if ($repetidos){
			$success = false; 
			$mensaje = "El Rif ya ha sido registrado, introduzca otro.";
		}

		$json = array('success' => $success,
					  'mensaje' => $mensaje,
					  'data' 	=> $data,
					  );
		return json_encode($json);
	}
}
