<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = "galeria";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','title','bo_ativo','sort_order','img']; 
}
