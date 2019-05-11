<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContatoCliente extends Model
{
    protected $table = "contato_cliente";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','nome','email','msg','assunto']; 
}
