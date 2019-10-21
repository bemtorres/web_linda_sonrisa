<?php

namespace App\Http\Controllers\Autentificador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelo\Ficha_cliente as Cliente;
use Auth;
use App\Http\Requests\ValidarLoginCliente as AuthRequest;

class AuthClienteController extends Controller
{
    public function logout(){
        
        Auth::guard('cliente')->logout();
        return redirect()->route('loginAdmin');
    }

    
    public function login(AuthRequest $request){
        
        // $pass = $request['password'];

        if(Auth::guard('cliente')->attempt([
                'username'=>$request->username,
                'password'=>$request->password
            ])){
                
            return redirect('socios-home');
        }else{
            // return 'no funciona';
               return back()->with('info','Empleado no existe.'); 
        }
    
    }
}
