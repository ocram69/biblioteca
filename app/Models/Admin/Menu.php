<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['nombre', 'url', 'icono'];
    // protected $guarded = ['id'];
    /*si no existen los campos timestate*/
    public $timestamps = false;

    public function getMenus($menusPorRol)
    {
        /**
         * $menusPorRol=true se solicita los menus deacuerdo al rol del usuario autenticado
         * 
         */
        if ($menusPorRol) {
            //dd(session()->get('rol_id'));
            return $this->whereHas('roles', function (Builder $query) {
                $query->whereIn('rol_id', session()->get('rol_id'))->orderBy('menu_id');
                //$query->where('rol_id', session()->get('rol_id'))->orderBy('menu_id');
            })->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        } else {
            return $this->orderby('menu_id')
                ->orderby('orden')
                ->get()
                ->toArray();
        }
    }

    public static function getMenu($menusPorRol = false)
    {
        $menuModel = new Menu();
        $menus = $menuModel->getMenus($menusPorRol);
        //dd($menus);
        $menuAll = [];
        foreach ($menus as $menu) {
            if ($menu['menu_id'] != 0)
                break;
            $item = [array_merge($menu, ['submenu' => $menuModel->getHijos($menus, $menu)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }
    public function getHijos($menus, $menu)
    {
        $children = [];
        foreach ($menus as $menu1) {
            if ($menu['id'] == $menu1['menu_id']) {
                $children = array_merge($children, [array_merge($menu1, ['submenu' => $this->getHijos($menus, $menu1)])]);
            }
        }
        return $children;
    }

    public function GuardarOrdenMenu($menusOrdenado)
    {
        $menusOrdenadoArrayObjetos = json_decode($menusOrdenado);
        foreach ($menusOrdenadoArrayObjetos as $indice => $valor) {
            $this->where('id', $valor->id)->update(['menu_id' => 0, 'orden' => $indice + 1]);
            if (!empty($valor->children)) {
                $this->subMenu($valor->children, $valor->id);
            }
        }
    }
    private function subMenu($submenu, $idPadre)
    {
        foreach ($submenu as $indice => $valor) {
            $this->where('id', $valor->id)->update(['menu_id' => $idPadre, 'orden' => $indice + 1]);
            if (!empty($valor->children)) {
                $this->subMenu($valor->children, $valor->id);
            }
        }
    }
    /*RELACION DE UNO A MUCHOS CON ROLES*/
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'menu_rol');
    }
}
