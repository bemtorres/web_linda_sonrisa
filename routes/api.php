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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('proveedor/auth/{token}/{username}/{password}', function ($token,$username,$password) {
    
//     $texto = $token . " " . $username . " " . $password;
//     return $texto;
// });
Route::get('proveedor/auth', 'Autentificador\ApiAuthProveedorController@login');
Route::post('proveedor/auth', 'Autentificador\ApiAuthProveedorController@login');



Route::get('/{id}/{username}/{password}', function ($id, $username) {

    return $id . " - " . $username;
});