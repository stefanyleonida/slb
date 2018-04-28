<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    protected $table = 'bibliotecas';
    protected $primaryKey = 'id_biblioteca';

    protected $fillable = ['nome_biblioteca','endereco','cep','telefone','instituicao','id_cidade', 'status'];

    // busca cidade relacionada a biblioteca relacionamento de 1 para 1
    public function cidade()
    {

      return $this->hasOne(Cidade::class, 'id_cidade', 'id_cidade');
    }

    //Função que retorna status por escrito se ativo ou inativo
    public function status()
    {
      $status = "Inativo";
      if($this->status == 1){
        $status = "Ativo";
      }
      return $status;
    }
}
