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

Route::get('home', 'HomeController@index');
Route::get('auth/cerrar', 'LoginController@CerrarSesion');
Route::get('/', 'WelcomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

$router->group(['middleware' => 'auth'], function() {
});

Route::get('prueba/{parametro}', 'PruebaController@callprocedure');
Route::any('upload/img', 'ImgController@create' );


Route::get('empresa', 'EmpresaController@actionIndex');
Route::any('empresa/consulta', 'EmpresaController@actionConsulta');
Route::any('empresa/registrar', 'EmpresaController@actionRegistrar');
Route::any('empresa/editar/{id_empresa?}', 'EmpresaController@actionEditar');
Route::any('empresa/actualizar', 'EmpresaController@actionActualizar');
Route::any('empresa/empresa-procesado', 'EmpresaController@actionEmpresa_procesado');
Route::any('empresa/mostrar', 'EmpresaController@actionMostrar');
Route::any('empresa/sucursal/{id}', 'EmpresaController@actionSucursal');
Route::any('empresa/nueva-sucursal', 'EmpresaController@actionSucursal_procesado');
Route::any('empresa/crear-publicidad/{id}','EmpresaController@ActionAgregar_Publicidad');
Route::any('empresa/publicidad-creado','EmpresaController@ActionGuardar_Publicidad');



Route::get('theme', 'WelcomeController@theme');
//___________________________________Movil__________________________________________________________

Route::any('movil/empresa/estados', 'Movil\EmpresaController@ActionEstados');
Route::any('movil/empresa/categoria', 'Movil\EmpresaController@ActionCategorias');
Route::any('movil/empresa/categoria-estado', 'Movil\EmpresaController@ActionCategoriaEstado');
Route::any('movil/empresa/empresa-categoria', 'Movil\EmpresaController@ActionEmpresaCategoria');
Route::any('movil/empresa/empresa-detalle', 'Movil\EmpresaController@ActionEmpresaDetalle');
Route::any('movil/empresa/publicidad', 'Movil\EmpresaController@ActionPublicidad');

//___________________________________Empresas_______________________________________________________

Route::get('misempresas/listar','MisEmpresasController@Listar');
Route::any('misempresas/agregar', 'MisEmpresasController@Agregar');
Route::any('misempresas/editar/{id_empresa?}', 'MisEmpresasController@Editar');
Route::any('misempresas/editar-exitoso', 'MisEmpresasController@Editar_Exitoso');
Route::any('misempresas/agregar-exitoso', 'MisEmpresasController@Agregar_Exitoso');
Route::any('misempresas/agregar-sucursal/{id}', 'MisEmpresasController@Agregar_sucursal');
Route::any('misempresas/agregar-sucursal-exitoso', 'MisEmpresasController@Agregar_sucursal_Exitoso');

//__________________________________Publicidades____________________________________________________

Route::get('mispublicidades/listar-publicidad/{id}', 'MisPublicidadesController@ListarPublicidad');
Route::any('mispublicidades/crear-publicidad/{id}','EmpresaController@ActionAgregar_Publicidad');
Route::any('mispublicidades/publicidad-creado','EmpresaController@ActionGuardar_Publicidad');