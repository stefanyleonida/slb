<?php

use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidades = [
          ["cidade" => "Taguatinga"],
          ["cidade" => "Candangolândia"],
          ["cidade" => "Ceilândia"],
          ["cidade" => "Recanto das Emas"],
          ["cidade" => "Núcleo Bandeirante"],
          ["cidade" => "São Sebastião"],
          ["cidade" => "Gama"],
          ["cidade" => "Guará"],
          ["cidade" => "Riacho Fundo I"],
          ["cidade" => "Riacho Fundo II"],
          ["cidade" => "Samambaia"],
          ["cidade" => "Cruzeio"],
          ["cidade" => "Lago Norte"],
          ["cidade" => "Lago Sul"],
          ["cidade" => "Brasília"]
        ];

        DB::table('cidades')->insert($cidades);
    }
}
