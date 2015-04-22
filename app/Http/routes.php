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
Route::get('registro', 'EmpresaController@actionIndex');
Route::any('registro/empresa', 'EmpresaController@actionEmpresa');
Route::any('registro/registrar', 'EmpresaController@actionRegistrar');
Route::any('registro/editar/{id_empresa?}', 'EmpresaController@actionEditar');
Route::any('registro/actualizar', 'EmpresaController@actionActualizar');
Route::any('registro/empresa-procesado', 'EmpresaController@actionEmpresa_procesado');
Route::any('registro/mostrar', 'EmpresaController@actionMostrar');
