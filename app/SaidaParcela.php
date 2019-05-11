<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaidaParcela extends Model
{
    protected $table = "saida_parcela";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','id_saida','bo_pago','bo_ativo','vl_parcela','dt_pagamento','dt_vencimento']; 
}
// id|id_saida|bo_ativo|bo_pago|vl_parcela|dt_pagamento|dt_vencimento|updated_at|created_at