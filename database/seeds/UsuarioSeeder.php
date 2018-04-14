<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Administrador',
        'email' => 'admin@admin.com',
        'cpf' => '000.000.000-00',
        'password' => bcrypt('admin123'),
        'id_tipo_usuario' => 1,
        'id_biblioteca' => 1,
      ]);

    }
}
