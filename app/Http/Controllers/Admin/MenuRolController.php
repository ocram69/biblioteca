<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Rol;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuRolController extends Controller
{
    function index()
    {
        /** Extraigo todos los roles  ddd($roles)*/
        $roles = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        /** extraigo el todo los menus con sus submenus */
        $menus = Menu::getMenu();
        /** extraigo los menus con sus tespectivos roles id-menu=>[roles] */
        $menusRoles = Menu::with('roles')->get()->pluck('roles', 'id')->toArray();
        //$menu=$menus[0];
        //ddd(array_column($menusRoles[$menu["id"]], "id"));
        //ddd($menus);
        return view('admin.menus-roles.index', compact(['roles', 'menus', 'menusRoles']));
    }

    public function gestionar(Request $request)
    {
        if ($request->ajax()) {
            $menus = new Menu();
            if ($request->input('estado') == 1) {
                $menus->find($request->input('menu_id'))->roles()->attach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se asigno correctamente']);
            } else {
                $menus->find($request->input('menu_id'))->roles()->detach($request->input('rol_id'));
                return response()->json(['respuesta' => 'El rol se elimino correctamente']);
            }
        } else {
            abort(404);
        }
    }
}
