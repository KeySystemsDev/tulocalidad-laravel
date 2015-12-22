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
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get( 'login', 'LoginController@login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@Logout');

Route::get('registrar', 'LoginController@registro');
Route::post('registrar', 'LoginController@postRegistro');

Route::get('forget-password', 'LoginController@forgetPassword');
Route::post('forget-password', 'LoginController@postForgetPassword');

Route::get('/','ClientController@index');

Route::get('/lista-empresas','ClientController@listarEmpresas');
Route::get('/lista-productos','ClientController@listarProductos');
Route::get('/lista-servicios','ClientController@listarServicios');

Route::get('/detalle-empresa','ClientController@DetalleEmpresa');
Route::get('/detalle-producto','ClientController@DetalleProducto');
Route::get('/detalle-servicio','ClientController@DetalleServicio');





$router->group(['middleware' => 'auth'], function() {
	Route::any('upload/img',		'ImgController@create');
	Route::get('reset-password', 'LoginController@resetPassword');
	Route::post('reset-password', 'LoginController@postResetPassword');

	Route::get('empresas/{id}/destroy','EmpresasController@destroy');
	Route::resource('empresas','EmpresasController');

	Route::get('empresas/{id_empresa}/servicio/{id_servicio}/destroy','ServiciosController@destroy');
	Route::resource('empresas.servicios','ServiciosController');

	Route::get('empresas/{id_empresa}/productos/{$id_productos}/destroy','ProductosController@destroy');
	Route::resource('empresas.productos','ProductosController');

	Route::get('redes_sociales/{redes_sociales}/destroy','RedesSocialesController@destroy');
	Route::resource('redes_sociales','RedesSocialesController');

	Route::get('/empresas/{id_empresa}/productos/{id_producto}/delete/{id_imagen}','ProductosController@destroyImagen');

//	CARRITO DE COMPRA //
	Route::get('/agregar-carrito/{id_producto}','ClientController@agregarACarrito');
	Route::get('/eliminar-carrito/{id_producto}','ClientController@eliminarDeCarrito');
	Route::get('/lista-carrito/','ClientController@listarCarrito');
	Route::get('/comprar/','ClientController@comprar');
	Route::get('/comprar/metodo-pago','ClientController@tipoDePago');

	//mercadopago
	Route::get('/comprar/mercadopago','ClientController@mercadopago1');
	Route::post('/comprar/mercadopago','ClientController@postMercadopago1');

});


//APIS
Route::group( [ 'prefix' => 'API' ], function ()
{
	Route::get('/productos/{empresa}', 'ApisController@getProductos');
	Route::get('/servicios/{empresa}', 'ApisController@getServicios');
	Route::get('/empresa/{empresa}', 'ApisController@getPerfilEmpresa');
	Route::get('/detalle-producto/{producto}', 'ApisController@getDetalleProducto');
 
} );
