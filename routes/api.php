<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('proveedor/auth', 'Autentificador\ApiAuthProveedorController@login');
Route::post('proveedor/auth', 'Autentificador\ApiAuthProveedorController@login');

Route::get('usuarios', function () {
    $usuarios = App\Modelo\Empleado::all();
    return  $usuarios;
});


Route::get('comunas/{id}', function(){
    $comunas = App\Modelo\Comuna::get();
    // return $comuna;
    return response()->json(['camunas' => $comunas], 200);
});