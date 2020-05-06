<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\models\LibroUsuario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class LibroUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $librosUsuarios = LibroUsuario::with('libro', 'usuario:id,nombre')->orderBy('fecha_prestamo')->get();
        return view('librosUsuarios.index', compact(['librosUsuarios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        // $librosNoPrestados = Libro::whereDoesntHave('prestamos', function (Builder $query) {
        //     $query->whereNull('fecha_devolucion');
        // })->get();
        /**Cuenteme cada libro cuntos estan prestados */
        $libros = Libro::withCount(['prestamos'  => function (Builder $query) {
            $query->whereNull('fecha_devolucion'); //cuenta los null
        }])->get()->filter(function ($item, $key) {
            return ($item->cantidad > $item->prestamos_count);
        })->pluck('titulo', 'id');

        //dd($libros);
        return view('librosUsuarios.crear', ['libros' => $libros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $prestamo = request()->validate([
            'libro_id' => 'required|integer',
            'prestado_a' => 'required|max:100',
            'fecha_prestamo' => 'required|date_format:Y-m-d'
        ]);
        //guardamos el prestamo por mdio de la relacion
        $libro = Libro::findOrFail($request->libro_id);
        $libro->prestamos()->create([
            'prestado_a' => $request->prestado_a,
            'fecha_prestamo' => $request->fecha_prestamo,
            'usuario_id' => auth()->user()->id
        ]);
        return redirect()->route('libroUsuario.index')->with('mensaje', 'El libro prestado se registró');
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
    public function modificar($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //
    }
    public function devolver(Request $request, LibroUsuario $libroUsuario)
    {
        if ($request->ajax()) {
            //dd($libroUsuario);
            if ($libroUsuario->update([
                'fecha_devolucion' => date('Y-m-d')
            ])) {
                return response()->json(['mensaje' => 'ok', 'fecha_devolucion' => date('Y-m-d')]);
            } else {
                return response()->json(['mensaje' => 'error']);
            }
            //return response()->json(['fecha_devolucion' => date('Y-m-d')]);
            // LibroPrestamo::where('libro_id', $libro_id)
            //     ->whereNull('fecha_devolucion')
            //     ->update(['fecha_devolucion' => date('Y-m-d')]);

        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }
}
