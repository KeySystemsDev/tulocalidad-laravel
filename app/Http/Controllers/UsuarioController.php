<?php namespace App\Http\Controllers;
use App\Usuario;

class UsuarioController extends Controller {

	public function CerrarSesion(){
		\Session::flush();
		return \Redirect::to('/servicios');
	}

	public function CambiarPassword(){
		return view('auth/reset');
	}

	public function PostCambiarPassword(){
		
		$contraseña_vieja = \Input::get('password_old');
		$contraseña_nueva = \Input::get('password');

		$id_usuario = \Session::get('id');
		if (!$id_usuario){
			$success = false;
			$msj 	 = 'session no iniciada.';
			$data	 = (object) ['logout'=>true];
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data);
			return json_encode($json);
		}
		$auth  = Usuario::where('id_usuario', '=', $id_usuario)->first();
		if (!$auth){
			$success = false;
			$msj 	 = 'session no iniciada.';
			$data 	 = (object) ['logout'=>true];
			$json 	 = array('success'  => $success,
							  'mensaje' => $msj,
							  'data' 	=> $data);
			return json_encode($json);
		}else{
			if ($auth->clave_usuario != \Input::get('password_old')){
				$success = false;
				$msj 	 = 'Contraseña incorrecta, Intente nuevamente.';
				$data 	 = (object) ['logout'=>false, 'pass'=>$auth->clave_usuario, 'nueva'=>$contraseña_nueva];
				$json 	 = array('success'  => $success,
								  'mensaje' => $msj,
								  'data' 	=> $data);
				return json_encode($json);
			}else{
				Usuario::where('id_usuario', '=', $id_usuario)->update(
				 	array(
				 		'clave_usuario' => $contraseña_nueva
					)
				);
			}
		}

		$success = true;
		$msj 	 = 'Su contraseña ha sido cambiada exitosamente.';
		$data 	 = "";
		$json 	 = array('success'  => $success,
						  'mensaje' => $msj,
						  'data' 	=> $data);
		return json_encode($json);
	}

}
