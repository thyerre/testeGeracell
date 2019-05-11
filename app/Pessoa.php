<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "users";
    protected $primaryKey   = 'cd_pessoa';
    protected $fillable = ['no_pessoa','nu_telefone','no_email','bo_ativo'];    

    public function getUsuarioPessoa(){
        return  \DB::table('users')->select('cd_usuario', 'email','pessoa.*')
        ->join('pessoa', 'users.cd_pessoa', '=', 'pessoa.cd_pessoa')
        ->where('users.cd_usuario', \JWTAuth::parseToken()->authenticate()['cd_usuario'])
        ->get()
        ->first();
    }
    public function getUsuarioPessoaByIdpessoa($cd_pessoa){
        return  \DB::table('users')->select('cd_usuario', 'email','pessoa.*')
        ->join('pessoa', 'users.cd_pessoa', '=', 'pessoa.cd_pessoa')
        ->where('users.cd_pessoa', $cd_pessoa)
        ->get()
        ->first();
    }
}
