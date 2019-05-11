<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servico";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','title','subtitle','bo_ativo','background_color','img']; 
}
