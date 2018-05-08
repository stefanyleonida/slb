<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'id_tipo_usuario', 'id_biblioteca', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // proteger senha de visualização
    protected $hidden = [
        'password', 'remember_token',
    ];

    //retorna o tipo de usuário
    public function getTipo()
    {

      return $this->hasOne(Models\TipoDeUsuario::class, 'id_tipo_usuario', 'id_tipo_usuario');
    }

    //retorna a bibloteca vinculada ao usuário
    public function biblioteca()
    {

      return $this->hasOne(Models\Biblioteca::class, 'id_biblioteca', 'id_biblioteca');
    }

    public function status()
    {
      $status = 'Ativo';

      if($this->status == 0){
        $status = 'Inativo';
      }

      return $status;
    }
}
