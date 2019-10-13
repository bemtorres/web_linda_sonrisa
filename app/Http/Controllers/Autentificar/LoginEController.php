<?php

namespace App\Http\Controllers\Autentificar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarLoginEmpleado;
// use Illuminate\Support\Facades\Hash;
use Auth;

use App\Modelo\Empleado;

class LoginEController extends Controller
{
    public function loginLaravel(ValidarLoginEmpleado $request){
        
        $empleado = Empleado::where('username',$request->username)->first();
        if($empleado){
            $pass =  hash('sha256', $request->password);
            if($empleado->password== $pass){
                // Auth::loginUsingId($empleado->id_empleado, true);
                // true == $request->remember;
                if(Auth::guard('empleado')->loginUsingId($empleado->id_empleado, true)){
                    
                
                    // Auth::guard('empleado')->login($empleado);

                    // return Auth::guard('empleado')->user();
                    // return auth('empleado')->user();

                    switch ($empleado->id_tipo_empleado) {
                        case 1: 
                            # administrador
                            return redirect()->route('inicio.admin');
                            break;
                        case 2:
                            # empleado
                            return redirect()->route('inicio.empleado');
                            // return back()->with('info','Error. Intente Nuevamente.'); 
                            break;
                        default:
                            return back()->with('info','Error. Intente Nuevamente.'); 
                            break;
                    }
                }else{
                    // return 'no';
                    return back()->with('info','Error. Intente Nuevamente.'); 
                }             
            }else{
                return back()->with('info','Error. Intente Nuevamente.'); 
                // return 'las contraseñas no son iguales';
            }
        }else{
            return back()->with('info','Error. Intente Nuevamente.'); 
            // return 'no existe';
        }
    
    }

    public function logout()
    {
        Auth::guard('empleado')->logout();
        return redirect()->route('loginAdmin');
    }

    
    public function login(ValidarLoginEmpleado $request){
        
        // $pass = $request['password'];

        if(Auth::guard('empleado')->attempt([
                'username'=>$request->username,
                'password'=>$request->password
            ], false)){
            
            // return $request;
            return redirect()->route('inicio.admin');
            // return redirect('/');
        }else{
            return 'no funciona';
        }
    
    }

}
