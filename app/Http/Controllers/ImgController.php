<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Response;
use Session;

class ImgController extends Controller {

	public function create()
	{
		$base64img = Input::get('img');
		$urlUpload = "uploads/temp/";
		$user = Session::get('usuario'); // -> aqui va el usuario logueado o el id del usuario


		$nameImg = $user.date("-d_n_Y-H:i:s");
		if (strpos($base64img,'png') !== true){
			$extension = ".png";
			$base64img = str_replace('data:image/png;base64,', '', $base64img);
		}else{
			$extension = ".jpg";
			$base64img = str_replace('data:image/jpg;base64,', '', $base64img);
		}

		$nameImg = $nameImg.$extension;
		$data = base64_decode($base64img);
		$url = $urlUpload.$nameImg;
		file_put_contents($url, $data);
		return Response::json(array('status'=>'success', 'name'=>$nameImg));
	}


}
