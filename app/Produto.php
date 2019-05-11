<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produto";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','ds_produto','observacao','bo_ativo','sort_order','img','nu_referencia','fabricante','vl_venda','vl_custo','dt_lancamento','cores','color','fornecedor']; 
}
// _order|nu_referencia|fabricante|vl_venda|vl_custo|dt_lancamento|cores|color|fornecedor|updated_at|created_at|