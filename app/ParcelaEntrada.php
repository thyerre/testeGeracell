<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelaEntrada extends Model
{
    protected $table = "parcela_entrada";
    protected $primaryKey   = 'id_parcelaentrada';
    protected $fillable = ['id_parcelaentrada','vl_entrada','id_parcela']; 
}