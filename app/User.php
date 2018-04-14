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
        'name', 'email', 'password', 'cpf', 'id_tipo_usuario', 'id_biblioteca'
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
}
