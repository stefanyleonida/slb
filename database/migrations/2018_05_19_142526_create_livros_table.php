<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_livro');
            $table->string('autor');
            $table->string('isbn')->nullable();
            $table->string('edicao');
            $table->year('ano');
            $table->string('editora');
            $table->integer('id_categoria')->nullable();
            $table->integer('id_biblioteca');
            $table->integer('id_idioma')->nullable();
            $table->integer('id_user');
            $table->timestamps();

            // relacionamentos
            $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
            $table->foreign('id_biblioteca')->references('id_biblioteca')->on('bibliotecas');
            $table->foreign('id_idioma')->references('id_idioma')->on('idiomas');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    // ['nome_livro','autor','isbn','edicao','ano','editora','id_categoria','id_biblioteca', 'id_idioma', 'id_user'];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
