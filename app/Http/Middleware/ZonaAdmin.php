<?php

namespace App\Http\Middleware;

use Closure;

class ZonaAdmin
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
            // if(auth('empleado')->user()->id_tipo_empleado==1){
                return $next($request);   
            // }            
        }
        return redirect('/');  
    }
}
