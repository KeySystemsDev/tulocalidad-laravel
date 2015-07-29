<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Publicidad;
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
								->get();
		if( !$empresas or count($empresas)==0 ){
			return view('servicio/sin_resultado');
		}

		return view('servicio/empresas', compact('empresas', 'id_estado', 'id_categoria'));
	}

	public function Empresa($id_empresa){
		$empresa                   = Empresa::where('id_empresa','=',$id_empresa)->first();
		$empresa->visitas_empresas = $empresa->visitas_empresas + 1;
		$empresa->save();

		if( !$empresa or count($empresa)==0 ){
			return view('servicio/sin_resultado');
		};

		$estado    = Estado::where('id_estado','=',$empresa->id_estado)->first()->nombre_estado;
		$categoria = Categoria::where('id_categoria','=',$empresa->id_categoria)->first()->nombre_categoria;

		return view('servicio/empresa_detalle', compact('empresa','estado','categoria'));
	}

	public function Publicidad($id_publicidad){
		$publicidad = Publicidad::where('id_publicidad','=',$id_publicidad)->first();
		$publicidad->visitas_publicidad = $publicidad->visitas_publicidad + 1;
		$publicidad->save();
		return view('servicio/recomendados_detalle', compact('publicidad'));
	}
}
