<?php

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
        factory(App\Models\Admin\Permiso::class,50)->create();
    }
}
