<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class ContatoClienteController extends Controller
{
    private $token;

    public function __construct() 
    {
        $this->token = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contato_cliente = \App\ContatoCliente::all();
        if(!$contato_cliente){
            return response(["response"=>"Não existe contato_cliente"],400);
        }
        return response($contato_cliente);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request['bo_ativo'] = true;

        $contato_cliente = \App\ContatoCliente::create($request->all());
        if(!$contato_cliente){
            return  response(["response"=>"Erro ao salvar contato_cliente"],400); 
        }
        return response(["response"=>"Salvo com sucesso",'ar'=>$contato_cliente]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato_cliente =\App\ContatoCliente::find($id);
        if(!$contato_cliente){
            return response(["response"=>"Não existe contato_cliente"],400);
        }
        return response($contato_cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contato_cliente =  \App\ContatoCliente::find($id);
        if(!$contato_cliente){
            return response(['response'=>'contato_cliente Não encontrado'],400);
        }
        $contato_cliente->nome =  $request['nome'];
        $contato_cliente->email =  $request['email'];
        $contato_cliente->assunto =  $request['assunto'];
        $contato_cliente->msg =  $request['msg'];
        

        if(!$contato_cliente->update()){
            return response(['response'=>'Erro ao alterar'],400);
        }
        return response(['response'=>'Atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato_cliente =  \App\ContatoCliente::find($id);
        if(!$contato_cliente){
            return response(['response'=>'contato_cliente Não encontrado'],400);
        }
        $contato_cliente->bo_ativo = false;
        if(!$contato_cliente->save()){
            return response(["response"=>"Erro ao deletar contato_cliente"],400);
        }
        return response(['response'=>'contato_cliente Inativado com sucesso']);
    }
}
