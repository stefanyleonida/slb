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
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_biblioteca')->unsigned();
            $table->integer('id_idioma')->unsigned()->nullable();
            $table->integer('id_user')->unsigned();
            $table->timestamps();

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
