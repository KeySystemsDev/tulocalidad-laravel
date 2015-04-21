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


Route::get('/', 'WelcomeController@index');
Route::get('registro', 'RegistroController@actionIndex');
Route::any('registro/empresa', 'RegistroController@actionEmpresa');
Route::any('registro/registrar', 'RegistroController@actionRegistrar');
Route::any('registro/editar/{id_empresa?}', 'RegistroController@actionEditar');
Route::any('registro/actualizar', 'RegistroController@actionActualizar');
Route::any('registro/empresa-procesado', 'RegistroController@actionEmpresa_procesado');
Route::any('registro/mostrar', 'RegistroController@actionMostrar');
