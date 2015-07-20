<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Empresa;
use App\Categoria;
use App\Estado;

class ServicioController extends Controller {

	public function Index(){
		$consulta = \DB::select('CALL p_t_publicidad(?,?,?,?,?,?)',array('listado_publicidades','','','','',''));
		return view('servicio/recomendados',compact('consulta'));
	}

	public function Todo(){
		$estados   = DB::table('t_estados')->get();
		return view('servicio/estados', compact('estados'));
	}

	public function Estado($id_estado){
		$estado 	= Estado::where('nombre_estado','=',$id_estado)->first();
		if ($estado == null){
			return view('servicio/sin_resultado');
		}

		$data 		= \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_categoria_por_estado','',$estado->id_estado,''));
		return view('servicio/categorias', compact('id_estado','data'));
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
								->get();
		if( !$empresas or count($empresas)==0 ){
			return view('servicio/sin_resultado');
		}

		return view('servicio/empresas', compact('empresas'));
	}

	public function Empresa($id_empresa){
		$empresa 	= Empresa::where('id_empresa','=',$id_empresa)->first();
		if( !$empresa or count($empresa)==0 ){
			return view('servicio/sin_resultado');
		}
		return view('servicio/empresa_detalle', compact('empresa'));
	}
}
