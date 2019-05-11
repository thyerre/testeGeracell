<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $table = "parcela";
    protected $primaryKey   = 'id_parcela';
    protected $fillable = ['id_parcela','id_saida','bo_ativo','tipo_parcela',]; 
}