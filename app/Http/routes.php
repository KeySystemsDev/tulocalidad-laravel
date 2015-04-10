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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('ejemplo', 'EjemploController@index');
Route::get('ejemplo/nueva/{id}', 'EjemploController@nueva');
Route::get('ejemplo/siguiente/{id}', 'EjemploController@siguiente');
Route::get('formulario', 'formularioController@index');
Route::post('formulario/recibir', 'formularioController@registro');
Route::get('registro/empresa-registro/empresa-formulario', 'RegistroController@empresa_registro');
Route::post('registro/empresa-registro/procesado', 'RegistroController@empresa_procesado');
Route::get('registro/publicidad-registro/publicidad-formulario', 'RegistroController@publicidad_registro');
Route::post('registro/publicidad-registro/procesado', 'RegistroController@publicidad_procesado');
Route::get('registro/usuario-registro/usuario-formulario', 'RegistroController@usuario_registro');
Route::post('registro/usuario-registro/procesado', 'RegistroController@usuario_procesado');
Route::get('conectar', 'formularioController@conectar');
Route::get('postfilter', 'formularioController@postFilters');
Route::get('users', 'UsersController@action_index');
