<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
  protected $table = 'cidades';
  protected $primaryKey = 'id_cidade';

  protected $fillable = ['cidade'];
}
