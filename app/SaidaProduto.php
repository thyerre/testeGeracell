<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaProduto extends Model
{
    protected $table = "saida_produto";
    protected $primaryKey   = 'id_saidaproduto';
    protected $fillable = ['id_saidaproduto','vl_produto','qt_produto','id_saida','vl_desconto',"id_produto"]; 
}