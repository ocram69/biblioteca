<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Rol;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Estaigo la coleccion de usuarios */
        $usuarios = Usuario::with('roles:roles.id,nombre')->orderBy('id', 'DESC')->get();
        //dd($usuarios);
        return view('admin.usuarios.index', compact(['usuarios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $roles = Rol::orderBy('nombre')->get()->pluck('nombre', 'id')->toArray();
        //dd($datas);
        return view('admin.usuarios.crear', ['roles' => $roles, 'usuario' => new Usuario()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        // dd($request);
        $usuarioValidado = request()->validate([
            'nombre'            => 'required|max:50',
            'email'             => 'required|email|max:100|unique:usuarios,email',
            'usuario'           => 'required|max:50|unique:usuarios,usuario',
            'password'          => 'required|min:5|max:100',
            'confirmarPassword' => 'required_with:password|same:password',
            'rol'               => 'required|array'
        ]);
        //dd($usuarioValidado);
        $usuario = Usuario::create($usuarioValidado);
        $usuario->roles()->attach($usuarioValidado['rol']);
        return redirect()->route('usuario.crear')->with('mensaje', 'El Usuario fue almacenado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modificar(Usuario $usuario)
    {
        $roles = Rol::orderBy('id')->get()->pluck('nombre', 'id')->toArray();
        //dd($datas);
        return view('admin.usuarios.editar', ['roles' => $roles, 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, Usuario $usuario)
    {
        $usuarioValidado = request()->validate([
            'nombre'            => 'required|max:50',
            'email'             => ['required', 'email', 'max:100', Rule::unique('usuarios')->ignore($usuario->id)],
            'usuario'           => ['required', 'max:50', Rule::unique('usuarios')->ignore($usuario->id)],
            'password'          => 'nullable|min:5|max:100',
            'confirmarPassword' => 'nullable|required_with:password|same:password',
            'rol'               => 'required|array'
        ]);

        //dd(array_filter($usuarioValidado));
        $usuario->update(array_filter($usuarioValidado));
        $usuario->roles()->sync($usuarioValidado['rol']);
        return redirect()->route('usuario.index')->with('mensaje', 'El usuario fue actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Usuario $usuario)
    {
        // if (request()->ajax()) {
        //     if ($usuario->delete()) {
        //         return response()->json(['mensaje' => 'ok']);
        //     } else {
        //         return response()->json(['mensaje' => 'error']);
        //     }
        // } else {
        //     abort(404);
        // }
        // $respuesta = DB::transaction(function () use ($usuario) {
        //     $usuario->roles()->detach();
        //     $usuario->delete();
        // });
        DB::beginTransaction();
        try {
            $usuario->roles()->detach();
            $usuario->delete();
            DB::commit();
            return response()->json(['mensaje' => 'ok']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['mensaje' => 'error']);
            throw $e;
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json(['mensaje' => 'error']);
            throw $e;
        }
    }
}
