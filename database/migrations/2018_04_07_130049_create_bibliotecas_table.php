<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliotecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecas', function (Blueprint $table) {
            $table->increments('id_biblioteca');
            $table->string('nome_biblioteca', 100);
            $table->string('endereco',250);
            $table->string('cep', 20);
            $table->string('telefone',20);
            $table->string('instituicao',250)->nullable();
            $table->integer('status')->default(1); //valor padrão ativo
            $table->timestamps();
            // relacionamento da tabela cidades
            $table->integer('id_cidade');
            $table->foreign('id_cidade')
            ->references('id_cidade')->on('cidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliotecas');
    }
}
