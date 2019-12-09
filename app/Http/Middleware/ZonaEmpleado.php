<?php

namespace App\Http\Middleware;

use Closure;

class ZonaEmpleado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('empleado')->check()){
            if(auth('empleado')->user()->id_tipo_empleado==2){
                return $next($request);   
            }            
        }
        return redirect('/');  
    }
}
