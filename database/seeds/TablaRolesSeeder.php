<?php

use App\Models\Admin\Rol;
use Illuminate\Database\Seeder;

class TablaRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombre' => 'Administrador']);
    }
}
