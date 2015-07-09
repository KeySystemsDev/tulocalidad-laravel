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
			return view('servicio/sinresultado');
		}

		$data 		= \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_categoria_por_estado','',$estado->id_estado,''));
		return view('servicio/categorias', compact('id_estado','data'));
	}

	public function Categoria($id_estado, $id_categoria){
		$categoria 	= Categoria::where('nombre_categoria','=',$id_categoria)->first();
		if ($categoria == null){
			return view('servicio/sinresultado');
		}
		$estado 	= Estado::where('nombre_estado','=',$id_estado)->first();
		if ($estado == null){
			return view('servicio/sinresultado');
		}
		$empresas 	= Empresa::where('id_estado','=',$estado->id_estado)
								->where('id_categoria','=',$categoria->id_categoria)
								->get();
		if( !$empresas or count($empresas)==0 ){
			return view('servicio/sinresultado');
		}

		return view('servicio/empresas', compact('id_estado', 'id_categoria','empresas'));
	}

	public function Empresa($id_estado, $id_categoria, $id_empresa){
		$categoria 	= Categoria::where('nombre_categoria','=',$id_categoria)->first();
		if ($categoria == null){
			return view('servicio/sinresultado');
		}
		$estado 	= Estado::where('nombre_estado','=',$id_estado)->first();
		if ($estado == null){
			return view('servicio/sinresultado');
		}
		$empresa 	= Empresa::where('id_estado','=',$estado->id_estado)
								->where('id_categoria','=',$categoria->id_categoria)
								->where('nombre_empresa','=',$id_empresa)
								->first();
		if( !$empresa or count($empresa)==0 ){
			return view('servicio/sinresultado');
		}
		return view('servicio/empresa_detalle', compact('id_estado', 'id_categoria', 'id_empresa','empresa'));
	}
}
