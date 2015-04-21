<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;
use DB;

class RegistroController extends Controller {

	public function actionIndex(){
		return View::make('registro/empresa_registro/consulta_rif');   
	}

	public function actionEmpresa(){
		$rif = (Input::get('i_rif'));
		$consulta = Empresa::where('rif_empresa','=', $rif)-> get();
			
		if(count($consulta) == 0){
			$categoria = DB::table('t_categoria')->get();
			$estados = DB::table('t_estados')->get();
			return View::make('registro/empresa_registro/empresa_registrar', compact('categoria','estados')); 	     
		}else{
			return View::make('registro/empresa_registro/mostrar_empresa', array('consulta' => $consulta));
		}
	} 
	public function actionEditar($id_empresa){
		$empresa = Empresa::where('id_empresa','=', $id_empresa)-> get() ->first();
		$categoria = DB::table('t_categoria')->get();
		$estados = DB::table('t_estados')->get();
		return View::make('registro/empresa_registro/empresa_editar', compact('empresa', 'categoria', 'estados'));
		
/*

			Empresa::where('id_empresa','=', Input::get('id_empresa'))->update(
				array(
					'nombre_empresa' => (Input::get('i_nombre')),
					'rif_empresa'    => (Input::get('i_rif')),
					'direccion_empresa' => (Input::get('i_direccion')),
					'empresa_categoria' => (Input::get('i_categoria')),
					'empresa_estado' => (Input::get('i_estados')),			
					'telefono_empresa' => (Input::get('i_telefono')),
					'telefono_2_empresa' => (Input::get('i_telefono2')),
					'telefono_3_empresa' => (Input::get('i_telefono3')),
					'telefono_movil_empresa '=> (Input::get('i_celular')),
				)
			);
			return Redirect::to('registro/empresa_registro/mostrar_empresa');
			
		}*/

	}
	public function actionEmpresa_procesado(){
		$empresa = new Empresa;
		$empresa->nombre_empresa = e(Input::get('i_nombre')); 	
		$empresa->rif_empresa = e(Input::get('i_rif'));
		$empresa->direccion_empresa = e(Input::get('i_direccion'));
		$empresa->id_categoria = e(Input::get('i_categoria'));
		$empresa->id_estado = e(Input::get('i_estados'));					
		$empresa->telefono_empresa = e(Input::get('i_telefono'));
		$empresa->telefono_2_empresa = e(Input::get('i_telefono2'));
		$empresa->telefono_3_empresa = e(Input::get('i_telefono3'));
		$empresa->telefono_movil_empresa = e(Input::get('i_celular'));
		$empresa->save();
		$a = 'se guardo exitosamente';
	 	return View::make('registro/empresa_registro/crear_empresa', compact('a'));   
	}

	public function getEliminar_registro(){
		return View::make('registro/empresa_registro/eliminar_empresa');   
	}

	public function postDestruir_empresa(){
		$irif= e(Input::get('rif'));
		$rifborrado = Empresa::where('empresa_rif','=',$irif)->get()->first();
		$rifborrado-> delete ();
 		echo "Su registro ha sido borrado";
	}
}

?>