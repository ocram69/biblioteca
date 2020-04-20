<?php

use Illuminate\Database\Seeder;
use App\Models\Seguridad\Usuario;
use Illuminate\Support\Facades\DB;

class TablaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Usuario Administrador
         */
        $usuario = Usuario::create([
            'nombre'    => 'administrador',
            'email'     => 'admin@oroestiba.com',
            'usuario'   => 'admin',
            'password'  => '12345'
        ]);
        $usuario->roles()->attach(1);
    }
}
