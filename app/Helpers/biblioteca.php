<?php

use App\Models\Admin\Permiso;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}
if (!function_exists('can')) {
    function can($permiso, $redirect = true)
    {
        //if (session()->get('rol_nombre') == 'Administrador') {
        if (in_array('Administrador', session()->get("rol_nombre"))) {
            return true;
        } else {
            $rolId = implode(session()->get('rol_id'));
            //dd($rolId);
            $permisos = cache()->tags('permiso')->rememberForever("permiso.rolid.$rolId", function () {
                return Permiso::whereHas('roles', function ($query) {
                    $query->whereIn('rol_id', session()->get('rol_id'));
                })->get()->pluck('slug')->toArray();
            });
            // dd($permisos);
            //dd(cache()->tags('Permiso')->get('Permiso.rolid.2'));
            if (!in_array($permiso, $permisos)) {
                if ($redirect) {
                    if (!request()->ajax())
                        return redirect()->route('inicio')->with('mensaje', 'No tienes permisos para entrar en este modulo')->send();
                    abort(403, 'No tiene permiso');
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}

/*function setActive($nombreRuta)
{
    return request()->routeIs($nombreRuta) ? 'active' : '';
}*/
