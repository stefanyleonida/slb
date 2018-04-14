<?php

use Illuminate\Database\Seeder;

class BibliotecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bibliotecas')->insert([
          'nome_biblioteca' => 'JK',
          'endereco' => 'Rua 1',
          'cep' => '72000-000',
          'telefone' => '(61)3333-3333',
          'id_cidade' => 1,        
        ]);
    }
}
