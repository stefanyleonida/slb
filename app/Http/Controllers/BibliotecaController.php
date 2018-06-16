<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Biblioteca;
use App\User;
use Auth;

class BibliotecaController extends Controller
{
    //lista todas bibiliotecas na tela lista
    public function listar()
    {
      //carrega a lista de bibiliotecas
      $bibliotecas = Biblioteca::all();

      //redireciona para tela
      return view('bibliotecas.lista', [
        'lista_bibliotecas' => $bibliotecas,
      ]);
    }

    //evita duplicidade de cadastro e edição de bibliotecas
    public function naoDuplicarBiblioteca($id = null, $nome, $cep)
    {

      $sql = Biblioteca::where('nome_biblioteca', $nome)
      ->where('cep', $cep);

      if($id != null){
        $sql->where('id_biblioteca', '<>', $id);
      }

      return $sql->count();
    }

    //chama a tela de cadastro
     public function cadastro()
    {

      //carrega a lista de cidades para view para o select de cidades
      $cidades = Cidade::orderBy('cidade')->get();

      return view('bibliotecas.cadastro', [
        'lista_cidades' => $cidades,
      ]);
    }

    // função de Cadastrar no banco
    public function cadastrar(Request $request)
    {
      //valida duplicidade da biblioteca
      if($this->naoDuplicarBiblioteca(null, $request->nome_biblioteca, $request->cep)){
        return redirect()
        ->back()
        ->withInput()
        ->with('alerta', [
          'tipo' => 'info',
          'texto' => 'Biblioteca já cadastrada!',
        ]);

      }

      //faz a validação dos campos do formulário
      $request->validate([
        'nome_biblioteca' => 'required|min:3',
        'id_cidade' => 'required',
        'cep' => 'required|min:9',
        'endereco' => 'required|min:4',
        'telefone' => 'required|min:14|unique:bibliotecas',
      ]);

      //instancia um novo objeto do tipo biblioteca passando como parametros todos os campos via request
      $biblioteca = New Biblioteca($request->all());

      //se salvar redireciona para a tela de lista de bibiliotecas junto com a mensagem de sucesso
      if($biblioteca->save()){
        return redirect()
        ->route('bibliotecas.listar')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Biblioteca salva com sucesso'
        ]);
      }

    }

    //chama a tela de cadastro
    public function edicao(Biblioteca $biblioteca)
    {
      //carrega a lista de cidades para view para o select de cidades
      $cidades = Cidade::orderBy('cidade')->get();

      return view('bibliotecas.editar', [
        'lista_cidades' => $cidades,
        'biblioteca' => $biblioteca,
      ]);
    }

    //função de editar no banco de dados
    public function editar(Request $request, Biblioteca $biblioteca)
    {
      //valida duplicidade da biblioteca
      if($this->naoDuplicarBiblioteca($biblioteca->id_biblioteca, $request->nome_biblioteca, $request->cep)){
        return redirect()
        ->back()
        ->withInput()
        ->with('alerta', [
          'tipo' => 'info',
          'texto' => 'Biblioteca já cadastrada!',
        ]);
      }
      // valida os campos indicados
      $request->validate([
        'nome_biblioteca' => 'required|min:3',
        'id_cidade' => 'required',
        'cep' => 'required|min:9',
        'endereco' => 'required|min:4',
        'telefone' => 'required|min:14',
      ]);

      //se editar retorna para a tela de lista junto com a mensagem de sucesso.
      if($biblioteca->update($request->all())){
        if(Auth::user()->id_tipo_usuario == 1){
          return redirect()
          ->route('bibliotecas.listar')
          ->with('alerta',[
            'tipo' => 'success',
            'texto' => 'Cadastro alterado com sucesso'
          ]);
        }
        else{
          return redirect()
          ->route('bibliotecas.visualizar', Auth::user()->id_biblioteca)
          ->with('alerta',[
            'tipo' => 'success',
            'texto' => 'Cadastro alterado com sucesso'
          ]);
        }

      }
    }

    //chama a tela de visualizar detalhes da biblioteca
    public function visualizar(Biblioteca $biblioteca)
    {
      return view('bibliotecas.visualizar', [
        'biblioteca' => $biblioteca,
      ]);
    }

    // altera status de todos usuários da biblioteca que não são administradores
    public function alteraStatusUsuario(int $id_biblioteca, $status)
    {

      $usuarios = User::where('id_biblioteca', $id_biblioteca)
      ->where('id_tipo_usuario', '<>', 1);

      $usuarios->update(['status' => $status]);
    }

    //altera o status da biblioteca entre ativo e inativo
    public function alteraStatus(Biblioteca $biblioteca)
    {

      // impede de alterar o status da sede
      if($biblioteca->id_biblioteca == 1){

        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'info',
          'texto' => 'Não é permitido alterar o status desta Biblioteca'
        ]);
      }

      //se o status atual da biblioteca for 0 altera para 1 se não altera para 0
      $status = 0;
      if($biblioteca->status == 0){
        $status = 1;
      }

      //se alterar o status retorna a tela de lista de bibliotecas junto com a mensagem de sucesso
      if($biblioteca->update(['status' => $status])){

        //se inativar a biblioteca inativa todos os usuários
        if($status == 0){
            $this->alteraStatusUsuario($biblioteca->id_biblioteca, $status);
        }

        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Status alterado com sucesso',
        ]);
      }
    }
}
