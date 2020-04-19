<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Rol;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    public function index()
    {
        $roles = Rol::orderBy('id', 'DESC')->get();
        return view('admin.roles.index', compact(['roles']));
    }

    public function crear()
    {
        return view('admin.roles.crear', ['rol' => new Rol()]);
    }

    public function guardar()
    {
        $rol = request()->validate([
            'nombre' => 'required|max:50|unique:roles,nombre'
        ]);
        Rol::create($rol);
        return redirect()->route('rol.crear')->with('mensaje', 'El menu fue almacenado exitosamente');
    }

    public function ver()
    {
    }

    public function modificar(Rol $rol)
    {
        return view('admin.roles.editar', compact(['rol']));
    }

    public function actualizar(Rol $rol)
    {
        $rolActual = request()->validate([
            'nombre' => ['required', 'max:50', Rule::unique('roles')->ignore($rol->id)]
        ]);
        $rol->update($rolActual);
        return redirect()->route('rol.index')->with('mensaje', 'El rol fue actualizado exitosamente');
    }

    public function eliminar(Rol $rol)
    {
        if (request()->ajax()) {
            if ($rol->delete()) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'error']);
            }
        } else {
            abort(404);
        }
    }
}
