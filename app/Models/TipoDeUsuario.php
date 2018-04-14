<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDeUsuario extends Model
{
  protected $table = 'tipo_de_usuarios';
  protected $primaryKey = 'id_tipo_usuario';

  protected $fillable = ['cidade'];
}
