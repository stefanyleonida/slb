<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('password');
            $table->integer('id_tipo_usuario');
            $table->integer('id_biblioteca');
            $table->rememberToken();
            $table->timestamps(); //coluna com data de cadastro e última alteração do cadastro
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
        Schema::dropIfExists('users');
    }
}
