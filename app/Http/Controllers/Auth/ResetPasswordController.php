<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
» Controlador De Redefinição De Senha
--------------------------------------------------------------------------»»»
Este controlador é responsável por solicitações de redefinição de senha manipulação
valete e usa um traço simples para incluir esse comportamento. Você está livre para
explorar esta característica valete e substituir os métodos de qualquer que você deseja ajustar.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
