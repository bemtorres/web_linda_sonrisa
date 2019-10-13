<?php

namespace App\Http\Controllers\Vista;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Auth;
use App\Modelo\Empleado;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct(){
        // $this->middleware('auth');
    }

    public function indexAdmin()
    {
        // return "hola";
        // if(auth()->guest()){
        //     return auth;
        // }else{
        //     return "no";
        // }
        // $e = auth('empleado')->user();
        $user = Auth::guard()->user();
        dd($user);
        // return "gola";
        // return $e->run;
        // return Auth::guard('empleado')->user();
        // return auth('empleado')->user();
        // return view('nuevo');
    }

    public function indexEmpleado()
    {
        
        return auth('empleado')->user();
        // return view('home');
    }

  

    public function indexCliente()
    {
        // return 'gola';
        return view('home');
    }
}
