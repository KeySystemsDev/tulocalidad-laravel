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
Route::get('prueba/{parametro}', 'PruebaController@callprocedure');
Route::get('empresa', 'EmpresaController@actionIndex');
Route::any('empresa/empresa', 'EmpresaController@actionEmpresa');
Route::any('empresa/registrar', 'EmpresaController@actionRegistrar');
Route::any('empresa/editar/{id_empresa?}', 'EmpresaController@actionEditar');
Route::any('empresa/actualizar', 'EmpresaController@actionActualizar');
Route::any('empresa/empresa-procesado', 'EmpresaController@actionEmpresa_procesado');
Route::any('empresa/mostrar', 'EmpresaController@actionMostrar');
