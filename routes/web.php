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
// inicio
Route::get('/', function () {  return view('a_home.inicio'); });
// login
Route::get('login-cliente',[ 'as' => 'loginCliente' ,  function () { return view('auth.login-cliente'); }]);
Route::get('login-admin',[ 'as' => 'loginAdmin' ,  function () { return view('auth.login-empleado'); }]);
// Iniciar sesion
Route::post('loginEmpleado',[ 'as' => 'loginEmpleado' , 'uses' => 'Autentificador\AuthAdminController@login']);
// Cerrar sesion
Route::get('logout', ['as'=>'salir' , 'uses' => 'Autentificador\AuthAdminController@logout']);


Route::get('home', function () { return view('home'); });


// Resources
Route::resource('empleado','EmpleadoController');
Route::resource('cliente','ClienteController');
Route::resource('administrador','AdministradorController');
Route::resource('proveedor','ProveedorController');
Route::resource('odontologo','OdontologoController');
Route::resource('familia','FamiliaController');
Route::resource('tipoproducto','TipoProductoController');



Route::get('limpio', ['as' => 'limpio' , function () {
    return view('limpio');
}]);


