<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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

    public function recuperarSenha(Request $request)
    {

      $request->validate([
        'email2' => 'required|email',
      ]);

      $user = User::where('email', $request->email2);

      if($user->count() == 0){
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'error',
          'texto' => 'E-mail não cadastrado!'
        ]);
      }

      if($user->count() == 1){

        $nova_senha = str_random(8);
      }
    }
}
