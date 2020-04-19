<?php

use Illuminate\Database\Seeder;
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
        DB::table('usuarios')->insert([
            'nombre'    => 'administrador',
            'email'     =>  'admin@oroestiba.com',
            'usuario'   => 'admin',
            'password'  => bcrypt('12345')
        ]);
        // DB::table('rol_usuario')->insert([
        //     'rol_id'    => 1,
        //     'usuario_id' => 1,
        //     'estado' => 1
        // ]);
        // /**
        //  * Usuario >Editor
        //  */
        // DB::table('usuarios')->insert([
        //     'nombre'    => 'editor',
        //     'usuario'   => 'editor',
        //     'email'     =>  'editor@oroestimba.com',
        //     'password'  => bcrypt('12345')
        // ]);
        // DB::table('rol_usuario')->insert([
        //     'rol_id'    => 2,
        //     'usuario_id' => 2,
        //     'estado' => 1
        // ]);
    }
}
