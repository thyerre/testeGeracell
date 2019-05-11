<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $primaryKey   = 'id';
    protected $fillable = ['nome','img','bo_ativo','sort_order','cpf','endereco','telefone','pessoa_referencia','email','dt_nascimento','color']; 
}
