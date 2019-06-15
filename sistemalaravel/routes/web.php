<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::get('ingreso', 'AuthController@showLogin');
Route::post('ingreso', 'AuthController@postLogin');

Route::group(['middleware' => 'auth.custom'], function () {

	Route::resource('productos', 'ProductoController');
	Route::get('/productos/{id}/delete', 'ProductoController@confirm');

	Route::resource('proveedores', 'ProveedorController');
	Route::get('/proveedores/{id}/delete', 'ProveedorController@confirm');

	Route::resource('usuarios', 'UsuarioController');
	Route::get('/usuarios/{id}/delete', 'UsuarioController@confirm');

	Route::get('administracion', 'AdministracionController@index');

	Route::get('/cuenta/actualizar', 'CuentaController@cargarActualizarCuenta');
	Route::post('actualizarCuenta', 'CuentaController@actualizarCuenta');

	Route::resource('estadisticas', 'EstadisticasController');

	Route::get('salir', 'AuthController@logOut');

});

