<?php

namespace App\Http\Middleware;

use Closure;

class InstitucionActivaMiddleware
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
        // TO Do logica para validar 

        return $next($request);
    }
}
