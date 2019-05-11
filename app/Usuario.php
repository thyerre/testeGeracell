<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "users";
    protected $primaryKey   = 'id';
    protected $fillable = [
        'email', 'password','nome','img','color','telefone','cpf','bo_ativo','endereco'
    ];
    protected $hidden = [
        'password'
    ];
}
