<?php

namespace App\Http\Controllers\Autentificador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelo\Ficha_proveedor as Proveedor;
use App\Http\Resources\ProveedorCollection as PJson;
use Auth;

class ApiAuthProveedorController extends Controller
{
    public function login(Request $request){
        
        
        $proveedor = Proveedor::where('username',$request->username)->first();

        if($proveedor){
            $pass =  hash('sha256', $request->password);
            if($proveedor->password== $pass){
                // return $proveedor; 
                return new PJson($proveedor);   
                // return $proveedor;   
            }else{
                return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código 2.'])],404);
            }
        }else{
            return response()->json(['errors'=>array(['code'=>404,'message'=>'No se encuentra un fabricante con ese código.'])],404);
        }
    
    }

    
  
}
