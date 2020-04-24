<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Permiso;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::orderBy('id', 'DESc')->get();
        return view('admin.permisos.index', compact(['permisos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('admin.permisos.crear', ['permiso' => new Permiso()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $permiso = request()->validate([
            'nombre' => 'required|max:50|unique:permisos,nombre',
            'slug' => 'required|max:50|unique:permisos,slug'
        ]);
        //$permiso['slug'] = Str::slug($permiso['nombre']);
        //dd($permiso);
        Permiso::create($permiso);
        return redirect()->route('permiso.crear')->with('mensaje', 'El menu fue almacenado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modificar(Permiso $permiso)
    {
        return view('admin/permisos.editar', compact(['permiso']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Permiso $permiso)
    {
        $permisoValidado = request()->validate([
            'nombre' => ['required', 'max:50', Rule::unique('permisos')->ignore($permiso->id)],
            'slug' => ['required', 'max:50', Rule::unique('permisos')->ignore($permiso->id)]
        ]);
        //$permisoValidado['slug'] = Str::slug($permisoValidado['nombre']);
        $permiso->update($permisoValidado);
        return redirect()->route('permiso.index')->with('mensaje', 'El permiso fue actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Permiso $permiso)
    {
        if (request()->ajax()) {
            if ($permiso->delete()) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'error']);
            }
        } else {
            abort(404);
        }
    }
}
