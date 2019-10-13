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
Route::post('loginEmpleado',[ 'as' => 'loginEmpleado' , 'uses' => 'Autentificar\LoginEController@login']);
// Cerrar sesion
Route::get('logout', ['as'=>'salir' , 'uses' => 'Auth\LoginController@logout']);


// Vistas
Route::get('inicio-empleado', ['as' => 'inicio.empleado' , 'uses' => 'Vista\HomeController@indexEmpleado' ]);
Route::get('inicio-admin', ['as' => 'inicio.admin' , 'uses' => 'Vista\HomeController@indexAdmin' ]);





Route::get('clientes', ['as' => 'clientes' , function () {
    return view('clientes.index');
}]);

Route::get('empleados', ['as' => 'empleados' , function () {
    return view('empleados.index');
}]);
Route::resource('empleado', 'EmpleadoController');


Route::get('limpio', ['as' => 'limpio' , function () {
    return view('limpio');
}]);


