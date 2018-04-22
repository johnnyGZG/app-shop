<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        // Verificar si un usuario esta logueado
        /* if (!auth()->check()){
            return redirect('/login');
        } */

        // Veridicar si un suario tiene el rol Administrador
        if (!auth()->user()->admin){
            return redirect('/');
        }

        return $next($request);
    }
}
