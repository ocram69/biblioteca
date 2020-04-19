<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Rules\ValidarCampoUrl;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menus.index', ['menus' => Menu::getMenu()]);
        //return Menu::getMenu();
    }
    public function crear()
    {
        return view('admin.menus.crear', ['menu' => new Menu()]);
    }
    public function guardar()
    {
        $menu = request()->validate([
            'nombre'    => 'required|max:50|unique:menus,nombre',
            'url'       => ['required', 'max:100', new ValidarCampoUrl("guardar")],
            'icono'     => 'nullable|max:50'
        ]);
        Menu::create($menu);
        return redirect()->route('menu.crear')->with('mensaje', 'El menu fue almacenado exitosamente');
    }
    public function ver()
    {
    }
    public function modificar(Menu $menu)
    {
        return view('admin.menus.editar', compact(['menu']));
    }
    public function actualizar(Menu $menu)
    {
        //dd($menu);
        $menuValidado = request()->validate([
            'nombre'    => ['required', 'max:50', Rule::unique('menus')->ignore($menu->id)],
            'url'       => ['required', 'max:100', new ValidarCampoUrl("actualizar")],
            'icono'     => 'nullable|max:50'
        ]);
        //dd($menu);
        $menu->update($menuValidado);
        return redirect()->route('menu.index')->with('mensaje', 'El menu fue actualizado exitosamente');
    }
    public function eliminar(Menu $menu)
    {
        /**
         * laravel se encarga de verificar que exista el id y si no existe devuelve 409
         */
        if ($menu == null) // no es necesario
            return redirect()->route('menu.index')
                ->with('mensaje', 'Menu no encontrado para su eliminacion');
        $menu->delete();
        return back()->with('mensaje', 'Eliminado correctamente');
    }
    public function guardarOrden()
    {
        if (request()->ajax()) {
            $menu = new Menu;
            $menu->GuardarOrdenMenu(request()->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
