<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    //indica para a classe o nome da tabela no banco
    protected $table = 'bibliotecas';

    //indica para a classe o nome da chave primária no banco
    protected $primaryKey = 'id_biblioteca';

    //define os nomes das colunas que serão adicionadas ou editadas nos métodos save() e update()
    protected $fillable = ['nome_biblioteca','endereco','cep','telefone','instituicao','id_cidade', 'status'];


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
