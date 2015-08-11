<?php namespace App\Http\Controllers\Movil;
header('Access-Control-Allow-Origin: *');
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Categoria;
use App\Estado;
use App\Empresa;
use App\Publicidad;

class EmpresaController extends Controller {

    public function ActionEstados(){
        $estados = DB::table('t_estados')->get();    
        return json_encode($estados);        
    }

    public function ActionCategorias(){
        $categoria = DB::table('t_categoria')->get();    
        return json_encode($categoria);        
    }

    public function ActionCategoriaEstado(){
        $estado     =e(Input::get('id_estado'));
        $data       = \DB::select('CALL p_t_empresas(?,?,?,?)',array('empresas_categoria_por_estado','',$estado,''));
        return json_encode($data);
    }

    public function ActionEmpresaCategoria(){
        $id_categoria   =e(Input::get('id_categoria'));
        $id_estado      =e(Input::get('id_estado'));

        $empresas       = Empresa::where('id_estado','=',$id_estado)
                                ->where('id_categoria','=',$id_categoria)
                                ->get();
        if( !$empresas or count($empresas)==0 ){
            return json_encode("");
        }

        return json_encode($empresas);
    }

    public function ActionEmpresaDetalle(){
        $id_empresa     = Input::get('id_empresa');
        $empresa        = Empresa::where('id_empresa','=',$id_empresa)->get()->all();        
//        $consulta   = DB::select('CALL p_t_empresas(?,?,?,?,?)',array('detalle_empresa','','','',$empresa));


        $publicidades   = Publicidad::where('id_empresa', $id_empresa)->get()->all();
        $success        = true;
        $msj            = "";
        $json           = array('success'  => $success,
                                    'mensaje'  => $msj,
                                    'consulta' => array('detalle'       => $empresa,
                                                        'publicidades'  => $publicidades
                                                    )
                                    );
        return json_encode($json);
    }
}
?>