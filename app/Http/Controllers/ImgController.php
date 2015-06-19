<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Response;

class ImgController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$base64img = Input::get('img');
		$urlUpload = "uploads/temp/";
		$user = "usuario"; // -> aqui va el usuario logueado o el id del usuario
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
