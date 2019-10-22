<?php

namespace App\Http\Controllers\Autentificador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelo\Ficha_cliente as Cliente;
use App\Modelo\Servicio;
use Auth;
use App\Http\Requests\ValidarLoginCliente as AuthRequest;

class AuthClienteController extends Controller
{
    public function logout(){        
        Auth::guard('cliente')->logout();
        return redirect()->route('loginCliente');
    }

    
    public function login(AuthRequest $request){
        
        // $pass = $request['password'];

        // return Auth::guard('cliente')->loginUsingId(1);

        try {
            $c = Cliente::where('username',$request->username)->first();
            // $p = bcrypt(12345);
            $pass =  hash('sha256', $request->password);

            if($c->password==$pass){
                // return $c;
                Auth::guard('cliente')->loginUsingId($c->id_ficha_cliente);
                // $servicios = Servicio::get();
                // return redirect('solicitud-hora');
                return redirect()->route('reservar-hora.index');
            }else{
                return back()->with('info','Cliente no existe.'); 
            }

        } catch (\Throwable $th) {
            return back()->with('info','Cliente no existe.'); 
        }

        // if(Auth::guard('cliente')->attempt([
        //     'username'=>$request->username,
        //     'password'=>$request->password
        // ])){        
        
        //     // return Auth::guard('empleado')->user();
        
        //     // return redirect()->route('inicio.admin');
        //     return redirect('home');
        // }else{
        //     // return 'no funciona';
        //     return $request;
           
        // }

    }
}
