<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Biblioteca;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecuperaSenha;
use App\Mail\UsuarioCriado;

class UserController extends Controller
{

    //protege as funções apenas usuario logado acessa
    public function __construnct()
    {

      $this->middleware('auth');
    }

    //função para trocar a senha do usuário
    public function trocarSenha(User $user, Request $request)
    {

        // valida a senha e a confirmação
        $request->validate([
          'senha' => 'required|min:6|required_with:confirmacao|same:confirmacao'
        ]);

        // aplica encriptação a senha antes de alterar no banco
        $password = [
          'password' => bcrypt($request->senha)
        ];

        //altera a senha e redireciona para mesma página atual junto com a mensagem de sucesso.
        if($user->update($password)){

          return redirect()
          ->back()
          ->with('alerta', [
            'tipo' => 'success',
            'texto' => 'Senha alterada com sucesso'
          ]);
        }
    }

    // função para listar usuários
    public function listar()
    {

      $usuarios = User::orderBy('name')
      ->get();

      return view('usuarios.listar', [
        'usuarios' => $usuarios
      ]);
    }

    // retorna tela de cadastro
    public function cadastro()
    {
      // lista bibliotecas para o select
      $bibliotecas = Biblioteca::orderBy('nome_biblioteca')
      ->get();

      return view('usuarios.cadastro', [
        'bibliotecas' => $bibliotecas
      ]);
    }

    public function cadastrar(Request $request)
    {

      $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'cpf' => 'required|min:14|unique:users',
      ]);

      $senha = str_random(8);

      $usuario = new User([
        'name' => $request->name,
        'email' => $request->email,
        'cpf' => $request->cpf,
        'password' => bcrypt($senha),
        'id_tipo_usuario' => $request->id_tipo_usuario,
        'id_biblioteca' => $request->id_biblioteca,
      ]);

      $dados_usuario = [
        'nome' => $usuario->name,
        'login' => $usuario->email,
        'senha' => $senha,
      ];

      Mail::to($usuario->email)
      ->send(new UsuarioCriado($dados_usuario));

      if($usuario->save()){
          return redirect()
          ->route('usuarios.listar')
          ->with('alerta', [
            'tipo' => 'success',
            'texto' => 'Usuário cadastrado com sucesso.'
          ]);
      }

    }

  public function edicao(User $usuario){

    $bibliotecas = Biblioteca::orderBy('nome_biblioteca')->get();

    return view('usuarios.edicao',[
      'bibliotecas' => $bibliotecas,
      'usuario' => $usuario,
    ]);

  }

    public function validaCpf(int $id, string $cpf)
    {

      $countCpf = User::where('id', '<>', $id)
      ->where('cpf', $cpf)->count();

      return $countCpf;

    }

    public function validaEmail(int $id, string $email)
    {

      $countEmail = User::where('id', '<>', $id)
      ->where('email', $email)->count();

      return $countEmail;

    }

    public function editar(Request $request, User $usuario)
    {

      if($this->validaCpf($usuario->id, $request->cpf)){
        return redirect()
        ->back()
        ->with('alerta',[
          'tipo' => 'info',
          'texto' => 'O CPF '.$request->cpf.' já foi utilizado por outro usuário',
        ]);
      }

      if($this->validaEmail($usuario->id, $request->email)){
        return redirect()
        ->back()
        ->with('alerta',[
          'tipo' => 'info',
          'texto' => 'O e-mail '.$request->email.' já foi utilizado por outro usuário',
        ]);
      }

      $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'cpf' => 'required|min:14',
      ]);

      if($usuario->update($request->all())){
        return redirect()
        ->route('usuarios.listar')
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Usuário editado com sucesso',
        ]);
      }
    }

    // função para alterar status
    public function alterarStatus(User $user)
    {

      // impede de alterar o status do Administrador
      if($user->id == 1){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'info',
          'texto' => 'Não é possível alterar status do Administrador'
        ]);
      }

      $status = 0;
      if($user->status == 0){
        $status = 1;
      }

      if($user->update(['status' => $status])){

        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'success',
          'texto' => 'Status alterado com sucesso'
        ]);
      }
    }

    public function visualizar(User $usuario)
    {

      return view('usuarios.visualizar',[
        'usuario' => $usuario,
      ]);
    }

    public function recuperarSenha(Request $request)
    {

      // valida senha obrigatória|tipo email
      $request->validate([
        'email2' => 'required|email',
      ]);

      // busca o usuário cadastrado com o e-mail informado
      $usuario = User::where('email', $request->email2);

      // se não for encontrado
      if($usuario->count() == 0){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'error',
          'texto' => 'E-mail não cadastrado!'
        ]);
      }

      // se for encontrado um usuário para esse e-mail
      if($usuario->count() == 1){

        // cria senha aleatória de 8 caracteres
        $nova_senha = str_random(8);

        $usuario = $usuario->first();

        // crio array com os dados do usuário que serão enviados para o email
        $dados_usuario = [
          'nome' => $usuario->name,
          'login' => $usuario->email,
          'senha' => $nova_senha,
        ];

        // envia os dados para o email do usuário
        Mail::to($usuario->email)
        ->send(new RecuperaSenha($dados_usuario));

        // faz o update da senha do usuário
        if($usuario->update(['password' => bcrypt($nova_senha)])){

          return redirect()
          ->back()
          ->with('alerta', [
            'tipo' => 'success',
            'texto' => 'Uma nova senha foi enviada para o e-mail '.$request->email.', aguarde alguns minutos.',
          ]);
        }
      }
    }

}
