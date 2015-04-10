<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use User;

class UsersController  extends Controller {
	public function action_index()
	{
		$users = User::all();
		return View::make('user.index')->with('users', $users);
	}
}