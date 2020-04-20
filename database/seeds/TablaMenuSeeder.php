<?php

use App\Models\Admin\Menu;
use Illuminate\Database\Seeder;

class TablaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['nombre' => 'Admin',               'url' => '#',                       'icono' => 'fas fa-users-cog',                              'menu_id' => 0, 'orden' => 1],
            ['nombre' => 'Usarios',             'url' => 'admin/usuarios',          'icono' => 'fas fa-user',                                   'menu_id' => 1, 'orden' => 1],
            ['nombre' => 'Roles',               'url' => 'admin/roles',             'icono' => 'fas fa-briefcase',                              'menu_id' => 1, 'orden' => 2],
            ['nombre' => 'Menus',               'url' => 'admin/menus',             'icono' => 'fas fa-minus',                                  'menu_id' => 1, 'orden' => 3],
            ['nombre' => 'Permisos',            'url' => 'admin/permisos',          'icono' => 'fas fa-chevron-circle-down',                    'menu_id' => 1, 'orden' => 4],
            ['nombre' => 'Asignacion',          'url' => '#',                       'icono' => 'fas fa-american-sign-language-interpreting',    'menu_id' => 1, 'orden' => 5],
            ['nombre' => 'Menu a Roles',        'url' => 'admin/menus-roles',       'icono' => 'fas fa-list',                                   'menu_id' => 6, 'orden' => 1],
            ['nombre' => 'Permisos a Roles',    'url' => 'admin/permisos-roles',    'icono' => 'fas fa-list',                                   'menu_id' => 6, 'orden' => 2],
            ['nombre' => 'Biblioteca',          'url' => '#',                       'icono' => 'fas fa-book-reader',                            'menu_id' => 0, 'orden' => 2],
            ['nombre' => 'Libros',              'url' => 'libros',                  'icono' => 'fas fa-book',                                   'menu_id' => 9, 'orden' => 1],
        ];
        foreach ($menus as $menu) {
            $menuCreado = Menu::create($menu);
            $menuCreado->roles()->attach(1);
        }
    }
}
