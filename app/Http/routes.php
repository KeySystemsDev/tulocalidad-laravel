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

Route::any('upload/img', 'ImgController@create' );

Route::any('empresa', 'EmpresaController@actionIndex');
Route::any('empresa/consulta', 'EmpresaController@actionConsulta');
Route::any('empresa/registrar', 'EmpresaController@actionRegistrar');
Route::any('empresa/editar/{id_empresa?}', 'EmpresaController@actionEditar');
Route::any('empresa/actualizar', 'EmpresaController@actionActualizar');
Route::any('empresa/empresa-procesado', 'EmpresaController@actionEmpresa_procesado');
Route::any('empresa/mostrar', 'EmpresaController@actionMostrar');
Route::any('empresa/sucursal/{id}', 'EmpresaController@actionSucursal');
Route::any('empresa/nueva-sucursal', 'EmpresaController@actionSucursal_procesado');
Route::any('empresa/crear-publicidad/{id}','EmpresaController@ActionAgregarPublicidad');
Route::any('empresa/publicidad-creado','EmpresaController@ActionGuardar_Publicidad');
Route::any('theme', 'WelcomeController@theme');

/*=======================================
=            Auth Controller            =
=======================================*/

Route::any('auth/cerrar', 'LoginController@CerrarSesion');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

$router->group(['middleware' => 'auth'], function() {

	/* MisEmpresas Controller*/

	Route::any('mis-empresas/','MisEmpresasController@Index');
	Route::any('mis-empresas/publicaciones/{id_empresa}','MisEmpresasController@PublicacionEmpresa');
	Route::any('mis-empresas/agregar', 'MisEmpresasController@Agregar');
	Route::any('mis-empresas/editar/{id_empresa?}', 'MisEmpresasController@Editar');
	Route::any('mis-empresas/editar-exitoso', 'MisEmpresasController@EditarExitoso');
	Route::any('mis-empresas/agregar-exitoso', 'MisEmpresasController@Agregar_Exitoso');
	Route::any('mis-empresas/agregar-sucursal/{id}', 'MisEmpresasController@Agregar_sucursal');
	Route::any('mis-empresas/agregar-sucursal-exitoso', 'MisEmpresasController@Agregar_sucursal_Exitoso');

	/* MisPublicidades Contoller */	

	Route::any('mis-publicidades/', 'MisPublicidadesController@Index');
	Route::any('mis-publicidades/agregar-publicidad/{id}','MisPublicidadesController@AgregarPublicidad');
	Route::any('mis-publicidades/agregar-publicidad','MisPublicidadesController@AgregarPublicidad');
	Route::any('mis-publicidades/agregar-exitoso','MisPublicidadesController@AgregarPublicidadExitoso');
	Route::any('mis-publicidades/editar-publicidad/{id_publicidad}','MisPublicidadesController@EditarPublicidad');

});


Route::any('movil/empresa/estados', 'Movil\EmpresaController@ActionEstados');
Route::any('movil/empresa/categoria', 'Movil\EmpresaController@ActionCategorias');
Route::any('movil/empresa/categoria-estado', 'Movil\EmpresaController@ActionCategoriaEstado');
Route::any('movil/empresa/empresa-categoria', 'Movil\EmpresaController@ActionEmpresaCategoria');
Route::any('movil/empresa/empresa-detalle', 'Movil\EmpresaController@ActionEmpresaDetalle');
Route::any('movil/empresa/publicidad', 'Movil\EmpresaController@ActionPublicidad');



Route::any('/', 'WelcomeController@index');

/*  Servicio Controller   */

Route::any('/servicios', 'ServicioController@Index');
Route::any('/servicios/todo', 'ServicioController@Todo');
Route::any('/servicios/estado/{id_estado}', 'ServicioController@Estado');
Route::any('/servicios/categoria/{id_estado}/{id_categoria}', 'ServicioController@Categoria');
Route::any('/servicios/empresa/{id_estado}/{id_categoria}/{id_empresa}', 'ServicioController@Empresa');



