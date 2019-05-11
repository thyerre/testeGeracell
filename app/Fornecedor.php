<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = "fornecedor";
    protected $primaryKey   = 'id';
    protected $fillable = ['id','nome_fantasia','cnpj','bo_ativo','telefone','ins_est','observacao','nome_contato','razao_social','endereco','pais']; 
}
// id|nome_fantasia|cnpj|bo_ativo|telefone|ins_est|observacao|nome_contato|razao_social|endereco|pais|updated_at|created_at|