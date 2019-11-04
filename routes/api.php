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
    return response()->json(['comunas' => $comunas], 200);
});

Route::get('ordenempleado/codigo/{codigo}', function($codigo){
    try {
        $orden = App\Modelo\Orden_empleado::where('codigo',$codigo)->first();

        $detalle = App\Modelo\Detalle_orden::join('producto', 'detalle_orden.id_producto', '=', 'producto.id_producto')
                                        ->where('id_orden_empleado',$orden->id_orden_empleado)
                                        ->select('producto.id_producto','nombre_producto', 'cantidad as cantidad_solicitada','cantidad_recibida','entregado')->get();
        $proveedor = App\Modelo\Ficha_proveedor::where('id_ficha_proveedor',$orden->id_ficha_proveedor)->first();
        $empleadoSolicitante = App\Modelo\Empleado::where('id_empleado',$orden->id_empleado)->select('run as rut','nombres','apellidos')->first();    
        $empleadoRecibido = array();
        try {
            $empleadoRecibido = App\Modelo\Empleado::where('id_empleado',$orden->id_empleado_r)->select('run as rut','nombres','apellidos')->first();
        } catch (\Throwable $th) {
            // return $th;
            $empleadoRecibido = new App\Modelo\Empleado();
        }
        

        $json = json_encode(array(
            'id_orden' => $orden->id_orden_empleado,
            'codigo' => $orden->codigo,
            'enviado' => $orden->enviado,
            'productos' => $detalle,
            'empleado_s' => $empleadoSolicitante,
            'empleado_r' => $empleadoRecibido,
            'proveedor' => $proveedor
        ));
        return Response()->json(array('productos'=>$json),200);   
        // return $json;

    } catch (\Throwable $th) {
        return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
    }
    
});

Route::get('ordenempleado/proveedor/{id}', function($id){
    try {
        $orden = App\Modelo\Orden_empleado::where('id_ficha_proveedor',$id)->get();
        
        $json = json_encode(array(
            'ordenes' => $orden
        ));
        return $json;

    } catch (\Throwable $th) {
        return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
    }
    
});


Route::get('proveedor/login/{username}/{password}', function($username,$password){

    try {
        $p = App\Modelo\Ficha_proveedor::where('username',$username)->first();
        
        if($p){
            $pass =  hash('sha256', $password);
            if($p->password== $pass){
               
                return Response()->json(array('proveedor'=>$p),200);   
            }else{
                return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
            }
        }else{
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
        }


        // $json = json_encode(array(
        //     'provedor' => $p
        // ));
        // return $json;

    } catch (\Throwable $th) {
        return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra.'])],404);
    }
    
});