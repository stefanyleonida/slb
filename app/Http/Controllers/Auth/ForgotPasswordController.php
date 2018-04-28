<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |-----------------
    | Controlador De redefinição de senha
    -------------------------------------------------------------------
    inição de senha inclui e-mails e
    tabuletas que um traço o envio de auxilia no de» as notificações de estes seu aplicativo para seus
     usuários. Sinta-se livre para explorar esta característica.»
    */

    use SendsPasswordResetEmails;

    /**
     * Criar uma nova instância do controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
