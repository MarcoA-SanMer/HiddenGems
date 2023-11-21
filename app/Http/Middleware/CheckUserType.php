<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $userType)
{
    if (! auth()->check() || auth()->user()->user_type != $userType) {
        // Si el usuario no ha iniciado sesión o si su tipo no coincide con el tipo requerido,
        // redirige al usuario a la página de inicio de sesión.
        return redirect('login');
    }

    return $next($request);
}
}
