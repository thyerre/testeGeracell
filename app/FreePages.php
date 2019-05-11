<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreePages extends Model
{
    protected $table = "freepages";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','title_seo','description_seo','keywords_seo','title','subtitle','url','content','bo_ativo','sort_order']; 
}
