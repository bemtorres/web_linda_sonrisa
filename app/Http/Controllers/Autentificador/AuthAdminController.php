<?php

namespace App\Http\Controllers\Autentificador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelo\Empleado;
use Auth;
use App\Http\Requests\ValidarLoginEmpleado as AuthRequest;


class AuthAdminController extends Controller
{
    public function loginLaravel(AuthRequest $request){
        
        $empleado = Empleado::where('username',$request->username)->first();

        // return $empleado;
        if($empleado){
            $pass =  hash('sha256', $request->password);
            if($empleado->password== $pass){
                // Auth::loginUsingId($empleado->id_empleado, true);
                // true == $request->remember;
                if(Auth::guard('empleado')->loginUsingId($empleado->id_empleado)){
                    
                
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
                    return 'no';
                    // return back()->with('info','Error. Intente Nuevamente.'); 
                }             
            }else{
                // return back()->with('info','Error. Intente Nuevamente.'); 
                return 'las contraseñas no son iguales' . $empleado->password . " - - " . $pass;
            }
        }else{
            // return back()->with('info','Error. Intente Nuevamente.'); 
            return 'no existe';
        }
    
    }

    public function logout()
    {
        Auth::guard('empleado')->logout();
        return redirect()->route('loginAdmin');
    }

    
    public function login(AuthRequest $request){
        
        // $pass = $request['password'];

        if(Auth::guard('empleado')->attempt([
                'username'=>$request->username,
                'password'=>$request->password
            ])){
            
            
            // return Auth::guard('empleado')->user();
            
            // return redirect()->route('inicio.admin');
            return redirect('home');
        }else{
            // return 'no funciona';
               return back()->with('info','Empleado no existe.'); 
        }
    
    }

}
