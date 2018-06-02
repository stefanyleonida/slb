<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biblioteca;
use App\Models\Livro;
use App\Models\Categoria;
use App\Models\Idioma;
use App\User;
use Auth;


class LivroController extends Controller
{

  //lista todos os livros da biblioteca
  public function listar()
  {
    //carrregar a lista de livros
    $livros = Livro::all();

    //se usuario logado não for admin, traz os livros da sua biblioteca
    if(Auth::user()->id_tipo_usuario <> 1 ){
      $livros = Livro::where('id_biblioteca', Auth::user()->id_biblioteca)
      ->get();
    }

    return view('livros.lista',[
      'livros' => $livros,
    ]);
  }

  // chamar a tela de cadastro do view
  public function cadastro()
  {
    //carregar a lista de idiomas no cadastro
    $idiomas = Idioma::orderBy('idioma')
    ->get();
    //carrega a lista de categoria no codastro
    $categorias = Categoria::orderBy('categoria')
    ->get();
    //carrega a lista de bibliotecas
    $bibliotecas = Biblioteca::where('status', 1)
    ->orderBy('nome_biblioteca')
    ->get();

    return view('livros.cadastro', [
      'idiomas' => $idiomas,
      'categorias' => $categorias,
      'bibliotecas' => $bibliotecas,
    ]);
  }

  //função de cadastrar o livro
  public function cadastrar(Request $request)
  {
    //função de validar os dados para o banco
    $request->validate([
      'nome_livro' => 'required',
      'edicao' => 'required',
      'ano' => 'required|min:4',
      'autor' => 'required|min:2',
      'editora' => 'required|min:2',
    ]);

    $livro = new Livro($request->all());

    //se salvar redireciona para a tela de lista de livros junto com a mensagem de sucesso
    if ($livro->save()) {
      return redirect()
      ->route('livros.listar')
      ->with('alerta',[
        'tipo' => 'success',
        'texto' => 'Livro salvo com sucesso'
      ]);
    }
  }

  //chama a tela de cadastro para edição
  public function edicao(Biblioteca $bibliotecas, Livro $livro)
  {

    //carregar a lista de biblioteca para usuario Administrador
    $bibliotecas = Biblioteca::orderBy('nome_biblioteca')->get();

    //carregar a lista de idiomas no formulário
    $idiomas = Idioma::orderBy('idioma')
    ->get();

    //carregar a lista de categoria no formulario
    $categorias = Categoria::orderBy('categoria')
    ->get();

    return view('livros.editar',[
      'bibliotecas' => $bibliotecas,
      'livro' => $livro,
      'idiomas' => $idiomas,
      'categorias' => $categorias,
    ]);
  }

  //função de editar no banco de dados
  public function editar(Request $request, Livro $livro )
  {

    //valida os campos indicados
    $request->validate([
      'nome_livro' => 'required',
      'autor' => 'required|min:2',
      'editora' => 'required|min:2',
      'ano' => 'required|min:4',
      'edicao' => 'required',
    ]);

    //se editar retorna para a tela de lista junto com a mensagem de sucesso.
    if($livro->update($request->all())) {
      return redirect()
      ->route('livros.listar')
      ->with('alerta',[
        'tipo' => 'success',
        'texto' => 'Cadastro alterado com sucesso'
      ]);
    }
  }

  //função de visualizar os dados
  public function visualizar(Livro $livro)
  {
    return view('livros.visualizar',[
      'livro' => $livro,
    ]);
  }

  //função de excluir os dados
  public function excluir(int $id)
  {

    $livro = Livro::findOrFail($id);

    if($livro->delete()){

      return redirect()
      ->back()
      ->with('alerta', [
        'tipo' => 'success',
        'texto' => 'Livro excluído com sucesso',
      ]);
    }
  }
}
