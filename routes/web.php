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
// Recuperar
Route::get('recuperar-empleado',function () { return view('auth.recuperar-empleado'); })->name('recuperarEmpleado');
Route::get('recuperar-cliente', function () { return view('auth.recuperar-cliente'); })->name('recuperarCliente');
// Cerrar sesion
Route::get('logout-admin', ['as'=>'salirAdmin' , 'uses' => 'Autentificador\AuthAdminController@logout']);
Route::get('logout-cliente','Autentificador\AuthClienteController@logout')->name('salirCliente');
// HOME
Route::get('home', function () { return view('home'); });
Route::get('cliente-home', function () { return view('perfil_cliente.home'); })->name('homeCliente');

//perfil
    //Cliente
Route::get('cliente-perfil', function () { return view('perfil_cliente.perfil'); })->name('homePerfil');
Route::get('cliente-cambio', function () { return view('perfil_cliente.cambio'); })->name('homeCambio');

//CambiarContraseña
    //Cliente
Route::post('cliente-cambio/cambio/{id}', 'ClienteController@cambiarClave' )->name('homeCambio.cambiar');


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
Route::resource('detalleservicio','DetalleServicioController');
Route::resource('detalleproveedor','DetalleProveedorController');
Route::resource('ordenempleado','OrdenEmpleadoController');
Route::resource('ordenpedido','DetalleOrdenController');
Route::resource('recepcion','RecepcionProductoController');
Route::resource('boletas','BoletaServicioController');

Route::get('servicio/ocultar/{id}','ServicioController@mostrar')->name('servicio.mostrar');
//Servicios
    //Ver Productos
Route::get('servicio/detalles/{id}','ServicioController@verServicios')->name('servicio.ver');
//Proveedor
    //Ver Productos
Route::get('proveedor/detalles/{id}','DetalleProveedorController@verProductos')->name('proveedor.ver');

Route::resource('reservar-hora','ReservarHoraController');
Route::get('cliente-historial','ReservarHoraController@historial')->name('cliente.historial');

//Orden Proveedores
Route::get('orden/solicitud','OrdenEmpleadoController@nueva')->name('solicitud.nuevo');
Route::get('orden/send/{id}','OrdenEmpleadoController@enviar')->name('solicitud.enviar');

// FETCH
Route::get('comunas/{id}','ComunaController@buscar');
// Route::get('prueba', function(){
//     return view('prueba.index');
// });
Route::get('verhorario/fecha/{fecha}','ReservarHoraController@horasDisponibles')->name('fetch.horaDisponible');
Route::get('detalleservicios/cantidad/producto/{id}','ProductoController@buscarProducto')->name('fetch.buscarDatosProductos');
Route::get('generarcodigo','OrdenEmpleadoController@code')->name('fetch.generarCodigo');
Route::get('proveedor/productos/buscar/{id}','DetalleProveedorController@buscarProductosProveedor')->name('fetch.buscarProdcutosProveedor');
Route::get('ordenpedido/codigo/{id}','OrdenEmpleadoController@buscarProductosPedidoCodigo')->name('fetch.pedidoCodigo');

Route::get('estadistica','BoletaServicioController@estadistica')->name('estadistica');


//Recepcion
// Route::resource('recepcion/{id}','RecepcionProductoController@ver');


// Eliminar
Route::post('documento/subir' ,'DetalleDocumentoController@subir')->name('documento.subir');
Route::get('documento/eliminar/{id}' ,'DetalleDocumentoController@eliminar')->name('documento.eliminar');
Route::post('detalle/solicitud/eliminar' ,'DetalleOrdenController@eliminar')->name('detallesolicitud.eliminar');



//Correo
Route::get('send/email', 'MailController@mail');
Route::post('email/recuperar/admin', 'MailController@recuperarEmpleado')->name('mail.recuperarAdmin');
Route::post('email/recuperar/cliente', 'MailController@recuperarCliente')->name('mail.recuperarCliente');




Route::get('limpio', ['as' => 'limpio' , function () {
    return view('limpio');
}]);





