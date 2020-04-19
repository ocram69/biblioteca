<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin\Rol;
use Illuminate\Http\Request;
use App\Models\Admin\Permiso;
use App\Http\Controllers\Controller;

class PermisoRolController extends Controller
{
    public function index()
    {
        /** Extraigo todos los roles  ddd($roles)*/
        $roles = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        /** extraigo el todo los menus con sus submenus */
        $permisos = Permiso::orderBy('id', 'DESC')->get()->toArray();
        /** extraigo los menus con sus tespectivos roles id-menu=>[roles] */
        $permisosRoles = Permiso::with('roles')->get()->pluck('roles', 'id')->toArray();
        //dd($permisosRoles);
        return view('admin.permisos-roles.index', compact(['roles', 'permisos', 'permisosRoles']));
    }

    public function gestionar(Request $request)
    {
        if ($request->ajax()) {
            /**
             * borro de cache el tag
             */
            cache()->tags('permiso')->flush();
            $permiso = new Permiso();
            if ($request->input('estado') == 1) {
                $permiso->find($request->input('permiso_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $permiso->find($request->input('permiso_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
