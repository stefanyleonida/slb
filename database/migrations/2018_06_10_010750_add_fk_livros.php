<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('livros', function(Blueprint $table){
         // relacionamentos tabela livros
         $table->foreign('id_categoria')->references('id_categoria')->on('categorias');
         $table->foreign('id_biblioteca')->references('id_biblioteca')->on('bibliotecas');
         $table->foreign('id_idioma')->references('id_idioma')->on('idiomas');
         $table->foreign('id_user')->references('id')->on('users');
       });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
