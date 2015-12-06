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
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'IndexClienteController@index');

Route::get( 'login', 'LoginController@login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@Logout');

Route::get('registrar', 'LoginController@registro');
Route::post('registrar', 'LoginController@postRegistro');

Route::get('forget-password', 'LoginController@forgetPassword');
Route::post('forget-password', 'LoginController@postForgetPassword');

Route::resource('empresas','EmpresasController');


$router->group(['middleware' => 'auth'], function() {
	Route::any('upload/img',		'ImgController@create');
	Route::get('reset-password', 'LoginController@resetPassword');
	Route::post('reset-password', 'LoginController@postResetPassword');
	
	Route::resource('empresas.servicios','ServiciosController');
	Route::resource('empresas.productos','ProductosController');
	Route::get('/empresas/{id_empresa}/productos/{id_producto}/delete/{id_imagen}','ProductosController@destroyImagen');

});
