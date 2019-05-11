<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = "contato";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','ds_endereco','title','sub_title','email','sort_order','nu_telefone_um','nu_telefone_dois','embed_map']; 
}
