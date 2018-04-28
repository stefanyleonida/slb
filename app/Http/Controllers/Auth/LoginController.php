<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
  Controlador De Login»»
  --------------------------------------------------------------------------»
  controlador lida com diferenças Este autenticação usuários para a aplicação e lhes»
   redirecionar sua tela home usos do controlador. um traço pagaria para convenientemente
   sua funcionalidade para fornecer seus aplicativos.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/bibliotecas/lista';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
