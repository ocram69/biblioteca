<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

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
    }

    public function ver()
    {
    }

    public function modificar()
    {
    }

    public function actualizar()
    {
    }

    public function eliminar()
    {
    }
}
