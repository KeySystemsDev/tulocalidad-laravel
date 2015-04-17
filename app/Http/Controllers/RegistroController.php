<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App\Empresa;

class RegistroController extends Controller {


	public function getIndex(){
		return View::make('registro/empresa_registro/consulta_rif');   
	}

	public function postEmpresa(){
		$rif= e(Input::get('i_rif'));
		$consulta = Empresa::where('empresa_rif','=', $rif)->get()->first();

		/*if(!$consulta){
			return View::make('registro/empresa_registro/empresa_editar', compact('consulta'));
		}else{
			return View::make('registro/empresa_registro/empresa_registrar', compact('consulta'));
		}
		//print_r($consulta);
		return View::make('registro/empresa_registro/mostrar_rif', compact('consulta'));	  */
	}


	public function postEmpresa_procesado(){
		$empresa = new Empresa;
		$empresa->empresa_nombre = e(Input::get('i_nombre'));
		$empresa->empresa_rif = e(Input::get('i_rif'));
		$empresa->empresa_direccion = e(Input::get('i_direccion'));
		$empresa->empresa_categoria = e(Input::get('i_categoria'));
		$empresa->empresa_estado = e(Input::get('i_estados'));					
		$empresa->empresa_telefono = e(Input::get('i_telefono'));
		$empresa->empresa_telefono2 = e(Input::get('i_telefono2'));
		$empresa->empresa_telefono3 = e(Input::get('i_ztelefono3'));
		$empresa->empresa_movil = e(Input::get('celular'));
		$empresa->save();
		$a = 'se guardo exitosamente';
	 	return View::make('registro/empresa_registro/procesado', compact('a'));   
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