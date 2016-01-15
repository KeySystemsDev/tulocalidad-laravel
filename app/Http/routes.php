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

Route::post( '/IPN', 'ClientController@IPNotificador');


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

Route::get('/detalle-empresa/{id}','ClientController@DetalleEmpresa');
Route::get('/detalle-producto/{id}','ClientController@DetalleProducto');
Route::get('/detalle-servicio/{id}','ClientController@DetalleServicio');



Route::get('/compras/','ClientController@listaCompras');

Route::get('empresas/configuracionMP','EmpresasController@configuracionMP');


$router->group(['middleware' => 'auth'], function() {
	Route::any('upload/img',		'ImgController@create');
	Route::get('reset-password', 'LoginController@resetPassword');
	Route::post('reset-password', 'LoginController@postResetPassword');

	Route::get('empresas/{empresas}/destroy','EmpresasController@destroy');
	Route::post('empresas/validrif','EmpresasController@validRif');


	Route::resource('empresas','EmpresasController');

	Route::get('/empresas/{empresas}/ventas/','EmpresasController@listaVentas');

	Route::get('empresas/{empresas}/productos/{productos}/deshabilitar','ProductosController@deshabilitar');
	Route::get('empresas/{empresas}/productos/{productos}/habilitar','ProductosController@habilitar');
	Route::get('empresas/{empresas}/productos/{productos}/destroy','ProductosController@destroy');
	Route::resource('empresas.productos','ProductosController');

	Route::get('empresas/{empresas}/servicios/{servicios}/deshabilitar','ServiciosController@deshabilitar');
	Route::get('empresas/{empresas}/servicios/{servicios}/habilitar','ServiciosController@habilitar');
	Route::get('empresas/{empresas}/servicios/{servicios}/destroy','ServiciosController@destroy');
	Route::resource('empresas.servicios','ServiciosController');


	Route::get('redes_sociales/{redes_sociales}/destroy','RedesSocialesController@destroy');
	Route::resource('redes_sociales','RedesSocialesController');

	Route::get('/empresas/{empresas}/productos/{productos}/delete/{imagen}','ProductosController@destroyImagen');

//	CARRITO DE COMPRA //
	Route::post('/agregar-carrito/','ClientController@agregarACarrito');
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
	Route::get('/detalle-servicio/{servicio}', 'ApisController@getDetalleServicio');

	Route::get('/lista-carrito/', 'ApisController@listCarrito' );
	Route::get('/agregar-carrito/', 'ApisController@agregarCarrito' );
	Route::get('/eliminar-carrito/', 'ApisController@eliminarCarrito' );
	Route::get('/login/', 'ApisController@login' );
	Route::get('/registrar/', 'ApisController@registrar' );
	Route::get('/forget-password/', 'ApisController@forgetPassword' );
 
} );
