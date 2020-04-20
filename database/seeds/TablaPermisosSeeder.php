<?php

use App\Models\Admin\Permiso;
use Illuminate\Database\Seeder;

class TablaPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            ['nombre' => 'Listar Libros'],
            ['nombre' => 'Crear Libro'],
            ['nombre' => 'Ver Libro'],
            ['nombre' => 'Editar Libro'],
            ['nombre' => 'Eliminar Libro'],
            ['nombre' => 'Prestar Libro'],
        ];
        foreach ($permisos as $permiso) {
            Permiso::create($permiso);
        }
    }
}
