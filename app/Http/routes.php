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
Route::get('theme', 'WelcomeController@theme');
Route::get('prueba/{parametro}', 'PruebaController@callprocedure');
Route::get('empresa', 'EmpresaController@actionIndex');
Route::any('empresa/consulta', 'EmpresaController@actionConsulta');
Route::any('empresa/registrar', 'EmpresaController@actionRegistrar');
Route::any('empresa/editar/{id_empresa?}', 'EmpresaController@actionEditar');
Route::any('empresa/actualizar', 'EmpresaController@actionActualizar');
Route::any('empresa/empresa-procesado', 'EmpresaController@actionEmpresa_procesado');
Route::any('empresa/mostrar', 'EmpresaController@actionMostrar');
Route::any('empresa/sucursal/{id}', 'EmpresaController@actionSucursal');
Route::any('empresa/nueva-sucursal', 'EmpresaController@actionSucursal_procesado');
Route::any('movil/empresa/estados', 'Movil\EmpresaController@ActionEstados');
Route::any('movil/empresa/categoria', 'Movil\EmpresaController@ActionCategorias');
Route::any('movil/empresa/categoria-estado', 'Movil\EmpresaController@ActionCategoriaEstado');
Route::any('movil/empresa/empresa-categoria', 'Movil\EmpresaController@ActionEmpresaCategoria');
Route::any('movil/empresa/empresa-detalle', 'Movil\EmpresaController@ActionEmpresaDetalle');
Route::any('movil/empresa/publicidad', 'Movil\EmpresaController@ActionPublicidad');
Route::any('empresa/crear-publicidad/{id}','EmpresaController@ActionAgregar_Publicidad');
Route::any('empresa/publicidad-creado','EmpresaController@ActionGuardar_Publicidad');
