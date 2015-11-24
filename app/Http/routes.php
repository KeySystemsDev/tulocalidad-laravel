<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
$router->group(['middleware' => 'auth'], function() {
	Route::get('/', 'IndexClienteController@index');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get( 'login', 'LoginController@login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@Logout');


Route::resource('empresas','EmpresasController');
Route::resource('empresas.servicios','ServiciosController');
Route::resource('empresas.productos','ProductosController');

