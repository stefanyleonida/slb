<?php

use Illuminate\Database\Seeder;

class TipoDeUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_de_usurios = [
          ['tipo_usuario' => 'Administrador'],
          ['tipo_usuario' => 'Bibliotecário']
        ];

        DB::table('tipo_de_usuarios')->insert($tipo_de_usurios);
    }
}
