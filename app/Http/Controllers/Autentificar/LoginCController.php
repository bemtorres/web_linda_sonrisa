<?php

namespace App\Http\Controllers\Autentificar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarLoginCliente;
use App\Modelo\Ficha_cliente as Cliente;
use Auth;

class LoginCController extends Controller
{
    public function loginLaravel(ValidarLoginCliente $request){
        
        $cliente = Cliente::where('cliente',$request->rut)->first();
        if($cliente){
            $pass =  hash('sha256', $request->password);
            if($cliente->password== $pass){
                Auth::loginUsingId($cliente->id_cliente, true);
                // return redirect('home');
                return Auth;
            }else{
                return 'las contraseñas no son iguales';
            }
        }else{
            return 'no existe';
        }
    
    }
}
