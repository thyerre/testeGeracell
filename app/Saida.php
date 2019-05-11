<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $table = "saida";
    protected $primaryKey   = 'id_saida';
    protected $fillable = ['id_saida','id_cliente','observacao','bo_ativo','dt_saida','id_usuario']; 
}