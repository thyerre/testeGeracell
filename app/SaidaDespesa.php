<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaDespesa extends Model
{
    protected $table = "saida_despesa";
    protected $primaryKey   = 'id_saidadespesa';
    protected $fillable = ['id_saidadespesa','ds_despesa','id_saida','qt_despesa',"vl_despesa",'id_pessoaresponsavel']; 
}
