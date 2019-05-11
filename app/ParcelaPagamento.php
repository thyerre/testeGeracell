<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParcelaPagamento extends Model
{
    protected $table = "parcela_pagamento";
    protected $primaryKey   = 'id_parcelapagamento';
    protected $fillable = ['id_parcelapagamento','vl_parcela','porcento_juros','bo_ativo','bo_pago',"dt_vencimento",'id_parcela','dt_pagamento']; 
}
