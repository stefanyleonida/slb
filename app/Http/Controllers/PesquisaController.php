<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use DB;

class PesquisaController extends Controller
{
    public function pesquisar(Request $request)
    {

      $livros = null;
      $busca = $request->busca;

      if($busca != null){
        $livros = Livro::join('bibliotecas', 'bibliotecas.id_biblioteca', 'livros.id_biblioteca')
        ->where('livros.nome_livro', 'like', '%'.$busca.'%')
        ->orWhere('livros.autor', 'like', '%'.$busca.'%')
        ->orWhere('bibliotecas.nome_biblioteca', 'like', '%'.$busca.'%')
        ->get();
      }

      return view('pesquisa.resultado', [
        'livros' => $livros,
        'busca' => $busca,
      ]);
    }
}
