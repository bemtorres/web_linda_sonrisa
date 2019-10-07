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


Route::get('/', function () {
    return view('a_home.inicio');
});
Route::get('login-cliente',[ 'as' => 'loginCliente' ,  function () {
    return view('auth.login-empleado');
}]);

Route::get('login-admin',[ 'as' => 'loginAdmin' ,  function () {
    return view('auth.login-empleado');
}]);

// Iniciar sesion
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
// Cerrar sesion
Route::get('logout', ['as'=>'salir' , 'uses' => 'Auth\LoginController@logout']);


Route::get('home', ['as' => 'home' , function () {
    return view('home');
}]);





Route::get('clientes', ['as' => 'clientes' , function () {
    return view('clientes.index');
}]);

// Route::get('empleados', ['as' => 'empleados' , function () {
//     return view('empleados.index');
// }]);
Route::resource('empleado', 'EmpleadoController');


Route::get('limpio', ['as' => 'limpio' , function () {
    return view('limpio');
}]);

Route::get('test', function(){
    $u = new App\User;
    $u->username='admin';
    $u->password= bcrypt('12345');
    $u->run='190553388';
    $u->nombres='Benjamin';
    $u->apellidos='Mora Torres';
    $u->id_tipo_user='1';
    $u->correo='benja.mora.torres@gmail.com';
    $u->activo=1;
    $u->save(); 
});
