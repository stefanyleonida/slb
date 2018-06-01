<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(BibliotecaSeeder::class);
        $this->call(TipoDeUsuarioSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(IdiomasSeeder::class);
    }
}
