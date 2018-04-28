<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Biblioteca;

class BibliotecaController extends Controller
{
    public function listar()
    {

      $bibliotecas = Biblioteca::all();

      return view('bibliotecas.lista', [
        'lista_bibliotecas' => $bibliotecas,

      ]);
    }

    //chama a tela de cadastro
     public function cadastro()
    {

      $cidades = Cidade::orderBy('cidade')->get();

      return view('bibliotecas.cadastro', [
        'lista_cidades' => $cidades,
      ]);
    }

    // função de Cadastrar
    public function cadastrar(Request $request)
    {

      $biblioteca = New Biblioteca([
        'nome_biblioteca' => $request->nome_biblioteca,
        'cep' => $request->cep,
        'id_cidade' => $request->id_cidade,
        'endereco' => $request->endereco,
        'telefone' => $request->telefone,
        'instituicao' => $request->instituicao,
      ]);

      if($biblioteca->save()){

        return redirect()
        ->route('bibliotecas.listar')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Biblioteca salva com sucesso'
        ]);
      }else{
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'error',
          'texto' => 'Ocorreu um erro, não foi possível salvar.'
        ]);
      }

    }

    public function edicao()
    {
      return view('bibliotecas.editar');
    }
    public function visualizar()
    {
      return view('bibliotecas.visualizar');
    }
}
