<?php

namespace App\Http\Controllers;
use App\Models\Biblioteca;
use App\Models\Livro;
use App\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RelatorioController extends Controller
{

    public function gerarRelatorio(Request $request)
    {

      $filtro_biblioteca = $request->filtro_biblioteca;

      //bibliotecas
      $bibliotecas = Biblioteca::all();

      //lista bibliotecas para para o select do filtro
      $select_bibliotecas = $bibliotecas;

      //total de livros
      $qtd_livros = Livro::all();

      //Quantidade de Administradores
      $qtd_adm = User::where('id_tipo_usuario', 1);

      //Quantidade de Administradores
      $qtd_gestor = User::where('id_tipo_usuario', 3);

      //Quantidade de Bibliotecários
      $qtd_biblio = User::where('id_tipo_usuario', 2);

      //aplica filtro se houver
      if($filtro_biblioteca != null){
        $bibliotecas = Biblioteca::where('id_biblioteca', $filtro_biblioteca)->get();
        $qtd_livros = Livro::where('id_biblioteca', $filtro_biblioteca);
        $qtd_adm->where('id_biblioteca', $filtro_biblioteca);
        $qtd_gestor->where('id_biblioteca', $filtro_biblioteca);
        $qtd_biblio->where('id_biblioteca', $filtro_biblioteca);
      }

      return [
        'bibliotecas' => $bibliotecas,
        'select_bibliotecas' => $select_bibliotecas,
        'qtd_bibliotecas' => $bibliotecas->count(),
        'qtd_livros' => $qtd_livros->count(),
        'qtd_adm' => $qtd_adm->count(),
        'qtd_gestor' => $qtd_gestor->count(),
        'qtd_biblio' => $qtd_biblio->count(),
      ];

    }

    public function relatorio(Request $request)
    {      

      return view('relatorio.relatorio', $this->gerarRelatorio($request));
    }
}
