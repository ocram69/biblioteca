<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    public function index()
    {
        can('listar-libros');
        $libros = Libro::orderBy('id', 'DESC')->get();
        return view('libros.index', compact(['libros']));
    }
    public function crear()
    {
        return view('libros.crear', ['libro' => new Libro()]);
    }

    public function guardar()
    {
        //dd(request()->all());
        $libro = request()->validate([
            'titulo'    => 'required|max:100',
            'isbn'      => 'required|max:30|unique:libros,isbn',
            'autor'     => 'required|max:100',
            'cantidad'  => 'required|numeric|min:1|digits_between:1,2',
            'editorial' => 'nullable|max:50',
            'foto'      => 'nullable|image|mimes:jpg,JPG,jpeg,JPEG,png,PNG|max:1024'
        ]);
        //dd($libro);
        $libroValidado = (new Libro)->fill($libro);
        if (request()->hasFile('foto')) {
            $libroValidado->foto = Libro::setCaratula(request()->foto);
        }
        $libroValidado->save();
        // if ($foto = Libro::setCaratula(request()->foto))
        //     $libro['foto'] = $foto;

        // Libro::create($libro);
        return redirect()->route('libro.index')->with('mensaje', 'El libro se creo correctamente');
    }

    public function ver(Libro $libro)
    {
        if (request()->ajax()) {
            return view('libros.ver', compact(['libro']));
        } else {
            abort(404);
        }
    }

    public function modificar(Libro $libro)
    {
        return view('libros.editar', compact(['libro']));
    }

    public function actualizar(Libro $libro)
    {
        $libroValidado = request()->validate([
            'titulo'    => 'required|max:100',
            'isbn'      => ['required', 'max:30', Rule::unique('libros')->ignore($libro->id)],
            'autor'     => 'required|max:100',
            'cantidad'  => 'required|numeric|min:1|digits_between:1,2',
            'editorial' => 'nullable|max:50',
            'foto'      => 'nullable|image|mimes:jpg,JPG,jpeg,JPEG,png,PNG|max:1024'
        ]);
        // dd(request()->all());
        if (request()->hasFile('foto')) {
            $libroValidado['foto'] = Libro::setCaratula(request()->foto, $libro->foto);
        }
        // if ($foto  = Libro::setCaratula(request()->foto, $libro->foto))
        //     $libroValidado['foto'] = $foto;
        $libro->update($libroValidado);
        return redirect()->route('libro.index')->with('mensaje', 'El libro fue actualizado exitosamente');
    }

    public function eliminar(Libro $libro)
    {
        if (request()->ajax()) {
            $foto = $libro->foto;
            if ($libro->delete()) {
                if ($foto != 'default.png')
                    Storage::disk('public')->delete("imagenes/caratulas/$foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'error']);
            }
        } else {
            abort(404);
        }
    }
    public function eliminar_imagen(Libro $libro)
    {
        if (request()->ajax()) {
            //dd($libro);
            if ($libro->foto != 'default.png') {
                try {
                    Storage::disk('public')->delete("imagenes/caratulas/$libro->foto");
                    $libro->update(['foto' => 'default.png']);
                    return response()->json(['mensaje' => 'ok']);
                } catch (\Exception $e) {
                    return response()->json(['error' => 'recurso esta siendo usado']);
                }
            } else {
                return response()->json(['mensaje' => 'ok']);
            }
        } else {
            abort(404);
        }
    }
}
