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
Route::post('loginSocio',[ 'as' => 'loginSocio' , 'uses' => 'Autentificador\AuthClienteController@login']);
// Cerrar sesion
Route::get('logout-admin', ['as'=>'salirAdmin' , 'uses' => 'Autentificador\AuthAdminController@logout']);
Route::get('logout-cliente','Autentificador\AuthClienteController@logout')->name('salirCliente');
// HOME
Route::get('home', function () { return view('home'); });
Route::get('solicitud-hora', function () { return view('perfil_cliente.home'); });


// Resources
Route::resource('empleado','EmpleadoController');
Route::resource('cliente','ClienteController');
Route::get('cliente/activar/{id}' ,'ClienteController@activar')->name('cliente.activar');
Route::get('cliente/documentos/{id}' ,'DetalleDocumentoController@index')->name('cliente.documento');
Route::resource('administrador','AdministradorController');
Route::resource('proveedor','ProveedorController');
Route::resource('odontologo','OdontologoController');
Route::resource('familia','FamiliaController');
Route::resource('tipoproducto','TipoProductoController');
Route::resource('producto','ProductoController');
Route::resource('servicio','ServicioController');
Route::get('servicio/ocultar/{id}','ServicioController@mostrar')->name('servicio.mostrar');
Route::get('servicio/detalles/{id}','ServicioController@verServicios')->name('servicio.ver');
Route::resource('reservar-hora','ReservarHoraController');

// FETCH
Route::get('comunas/{id}','ComunaController@buscar');
Route::get('prueba', function(){
    return view('prueba.index');
});
Route::post('documento/subir' ,'DetalleDocumentoController@subir')->name('documento.subir');
Route::get('documento/eliminar/{id}' ,'DetalleDocumentoController@eliminar')->name('documento.eliminar');



Route::get('limpio', ['as' => 'limpio' , function () {
    return view('limpio');
}]);




