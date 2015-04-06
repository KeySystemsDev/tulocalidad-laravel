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
Route::get('registro/registro_empresa/f_empresa', 'RegistroController@registro_empresa');
Route::post('registro/registro_empresa/procesado', 'RegistroController@procesado_empresa');
Route::get('registro/registro_publicidad/f_publicidad', 'RegistroController@registro_publicidad');
Route::post('registro/registro_publicidad/procesado', 'RegistroController@procesado_publicidad');
Route::get('registro/registro_usuario/f_usuario', 'RegistroController@registro_usuario');
Route::post('registro/registro_usuario/procesado', 'RegistroController@procesado_usuario');