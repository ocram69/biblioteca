<?php

namespace App\Http\Middleware;

use Closure;

class PermisoAdministrador
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
        if ($this->permiso())
            return $next($request);
        return redirect('/')->with('mensaje', 'No tiene permiso para entrar aquí');
    }
    private function permiso()
    {
        return in_array('Administrador', session()->get("rol_nombre"));
        //return session()->get('rol_nombre') == 'Administrador';
    }
}
