<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|*/

Route::post('create','PruebaController@create');
Route::get('edit','PruebaController@edit');
Route::post('create','PruebaController@create');
Route::get('call/{consulta_estado}','PruebaController@callprocedure');
Route::post('/empresa/store','UserController@store');
Route::post('/empresa/update/{id}','UserController@update');
Route::get('/empresa/destroy/{id}','UserController@destroy');
Route::controller('empresa','PruebaController');
Route::get('/', 'WelcomeController@index');
Route::controller('registro', 'RegistroController');
Route::get('registro/publicidad-registro/publicidad-formulario', 'RegistroController@publicidad_registro');
Route::post('registro/publicidad-registro/procesado', 'RegistroController@publicidad_procesado');
Route::get('registro/usuario-registro/usuario-formulario', 'RegistroController@usuario_registro');
Route::post('registro/usuario-registro/procesado', 'RegistroController@usuario_procesado');
Route::get('conectar', 'formularioController@conectar');
Route::get('postfilter', 'formularioController@postFilters');

