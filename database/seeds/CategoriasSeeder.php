<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
          ['categoria' => 'Romance'],
          ['categoria' => 'Ficção'],
          ['categoria' => 'Científico'],
          ['categoria' => 'Acadêmico'],
          ['categoria' => 'Ação'],
          ['categoria' => 'Aventura'],
          ['categoria' => 'Infantil'],
          ['categoria' => 'Humor'],
          ['categoria' => 'Saúde'],
          ['categoria' => 'Didático'],
        ];

        DB::table('categorias')->insert($categorias);
    }
}
