<?php

namespace App\Http\Middleware;

use Closure;

class ValidadoMiddleware
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
        if (auth()->check() && auth()->user()->validado)
            return $next($request);

        return redirect('/adminUsuarioProductos')->with('mensaje', '¡Hola '.auth()->user()->nombre .'! En éste momento estás inhabilitado para
        gestionar publicaciones, por favor ponte en contacto con un administrador de tu empresa para que habilite tus credenciales.');
    }
}
