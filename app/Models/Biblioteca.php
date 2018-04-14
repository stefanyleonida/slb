<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $table = 'biblotecas';
    protected $primaryKey = 'id_biblioteca';

    protected $fillable = ['nome_biblioteca','endereco','cep','telefone','instituicao','id_cidade'];
}
