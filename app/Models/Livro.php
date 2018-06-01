<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
//indica para a classe o nome da tabela no banco
    protected $table = 'livros';

//indica para a classe o nome da chave primária no banco
    protected $primaryKey = 'id';

//define os nomes das colunas que serão adicionadas ou editadas nos métodos save()
    protected $fillable = ['nome_livro','autor','isbn','edicao','ano','editora','id_categoria','id_biblioteca', 'id_idioma', 'id_user'];

    //retorna o idioma do livro
    public function getIdioma()
    {
      return $this->hasOne(Idioma::class, 'id_idioma', 'id_idioma');
    }

    //retorn a categoria do livro
    public function getCategoria()
    {
      return  $this->hasOne(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function getBiblioteca()
    {
      return $this->hasOne(Biblioteca::class, 'id_biblioteca', 'id_biblioteca');
    }

}
