<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
  //indicando o nome tabela no bd
  protected $table = 'cidades';

  //indica para a classe o nome da chave primária no banco
  protected $primaryKey = 'id_cidade';

  //define os nomes das colunas que serão adicionadas ou editadas nos métodos save()
  protected $fillable = ['cidade'];
}
