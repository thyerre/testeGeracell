<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaServico extends Model
{
    protected $table = "saida_servico";
    protected $primaryKey   = 'id_saidaservico';
    protected $fillable = ['id_saidaservico','ds_servico','id_saida','qt_servico','vl_desconto',"vl_servico"]; 
}
