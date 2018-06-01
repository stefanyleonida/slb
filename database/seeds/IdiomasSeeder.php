<?php

use Illuminate\Database\Seeder;

class IdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idiomas = [
          ['idioma' => 'Português'],
          ['idioma' => 'Inglês'],
          ['idioma' => 'Espanhol'],
          ['idioma' => 'Francês'],
          ['idioma' => 'Italiano'],
        ];

        DB::table('idiomas')->insert($idiomas);
    }
}
