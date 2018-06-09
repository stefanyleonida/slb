<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
          // relacionamento com tipo usuário
          $table->foreign('id_tipo_usuario')->references('id_tipo_usuario')->on('tipo_de_usuarios');
          // relacionamento com biblioteca
          $table->foreign('id_biblioteca')->references('id_biblioteca')->on('bibliotecas');
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
