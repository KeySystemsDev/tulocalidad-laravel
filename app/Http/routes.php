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


/*=======================================
=            Auth Controller            =
=======================================*/
Route::get('home', 							'HomeController@index');
Route::any('theme', 						'WelcomeController@theme');
Route::any('auth/activacion/{id_usuario}',  'Auth\AuthController@HabilitarUsuario');
Route::any('verificacion/rif',				'ServicioController@VerificarRif');
Route::controllers([
	'auth' 		=> 'Auth\AuthController',
	'password'  => 'Auth\PasswordController',
]);

$router->group(['middleware' => 'auth'], function() {

	Route::any('upload/img',				 	'ImgController@create');
	Route::any('perfil/cambiar-password',		'UsuarioController@CambiarPassword');
	Route::post('perfil/post-cambiar-password', 'UsuarioController@PostCambiarPassword');
	Route::any('perfil/cerrar',					'UsuarioController@CerrarSesion');

	/* MisEmpresas Controller*/

	Route::any('mis-empresas/',							   'MisEmpresasController@Index');
	Route::any('mis-empresas/publicaciones/{id_empresa}',  'MisEmpresasController@PublicacionEmpresa');
	Route::any('mis-empresas/agregar', 					   'MisEmpresasController@Agregar');
	Route::any('mis-empresas/editar/{id_empresa?}', 	   'MisEmpresasController@Editar');
	Route::any('mis-empresas/deshabilitar/{id_empresa?}',  'MisEmpresasController@DeshabilitarEmpresa');
	Route::post('mis-empresas/editar-exitoso', 			   'MisEmpresasController@Editar_Exitoso');
	Route::post('mis-empresas/agregar-exitoso', 		   'MisEmpresasController@Agregar_Exitoso');
	Route::any('mis-empresas/agregar-sucursal/{id}', 	   'MisEmpresasController@Agregar_sucursal');
	Route::any('mis-empresas/agregar-sucursal-exitoso',    'MisEmpresasController@Agregar_sucursal_Exitoso');

	/* MisPublicidades Contoller */	

	Route::any('mis-publicidades/', 								'MisPublicidadesController@Index');
	Route::any('mis-publicidades/agregar-publicidad/{id}',			'MisPublicidadesController@AgregarPublicidad');
	Route::any('mis-publicidades/agregar-publicidad',				'MisPublicidadesController@AgregarPublicidad');
	Route::post('mis-publicidades/agregar-exitoso',					'MisPublicidadesController@AgregarPublicidadExitoso');
	Route::any('mis-publicidades/editar-publicidad/{id_publicidad}','MisPublicidadesController@EditarPublicidad');
	Route::any('mis-publicidades/deshabilitar/{id_publicidad?}', 	'MisPublicidadesController@DeshabilitarPublicidad');
	
});

/*  Servicio Controller   */

Route::any('/servicios', 'ServicioController@Index');
Route::any('/servicios/todo', 'ServicioController@Todo');
Route::any('/servicios/estado/{id_estado}', 'ServicioController@Estado');
Route::any('/servicios/categoria/{id_estado}/{id_categoria}', 'ServicioController@Categoria');
Route::any('/servicios/empresa/{id_empresa}', 'ServicioController@Empresa');
Route::any('/servicios/publicacion/{id_publicidad}', 'ServicioController@Publicidad');


Route::any('movil/empresa/estados', 'Movil\EmpresaController@ActionEstados');
Route::any('movil/empresa/categoria', 'Movil\EmpresaController@ActionCategorias');
Route::any('movil/empresa/categoria-estado', 'Movil\EmpresaController@ActionCategoriaEstado');
Route::any('movil/empresa/empresa-categoria', 'Movil\EmpresaController@ActionEmpresaCategoria');
Route::any('movil/empresa/empresa-detalle', 'Movil\EmpresaController@ActionEmpresaDetalle');
Route::any('movil/empresa/publicidad', 'Movil\PublicidadController@ActionPublicidad');



Route::any('/', 'WelcomeController@index');
Route::any('pago', 'PagoPruebaController@pago');




