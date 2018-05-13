<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogarController extends Controller
{
    public function logar(Request $request)
    {

      // valida o formulário
      $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|min:6'
      ]);

      // se email ou senha incorretos
      if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){

        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'error',
          'texto' => 'E-mail ou senha incorretos.',
        ]);
      }

      // se o status do usuário for inativo sai e informa para o usuário
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 0])) {
        Auth::logout();
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'error',
          'texto' => 'Usuário inativo, contate o  administrador.',
        ]);
      }

      // se for do tipo administrador
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'id_tipo_usuario' => 1])){

        return redirect()
        ->route('usuarios.listar');
      }

      // se for do tipo bibliotecário
      if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'id_tipo_usuario' => 2])){

        Auth::logout();
        return redirect()
        ->back()
        ->with('alerta', [
          'tipo' => 'info',
          'texto' => 'Ainda não está pronto.',
        ]);
      }
    }
}
