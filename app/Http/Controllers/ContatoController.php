<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Helpers;

class ContatoController extends Controller
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

        $contato = \App\Contato::first();
        if(!$contato){
            return response(["response"=>"Não existe contato"],400);
        }
        return response($contato);
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

        $contato = \App\Contato::create($request->all());
        if(!$contato){
            return  response(["response"=>"Erro ao salvar contato"],400); 
        }
        return response(["response"=>"Salvo com sucesso",'ar'=>$contato]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato =\App\Contato::find($id);
        if(!$contato){
            return response(["response"=>"Não existe contato"],400);
        }
        return response($contato);
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
        $contato =  \App\Contato::find($id);
        if(!$contato){
            return response(['response'=>'depoimento Não encontrado'],400);
        }
        $contato = Helpers::processarColunasUpdate($contato,$request->all());
        
        if(!$contato->update()){
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
        $contato =  \App\Contato::find($id);
        if(!$contato){
            return response(['response'=>'contato Não encontrado'],400);
        }
        if(!$contato->delete()){
            return response(["response"=>"Erro ao deletar contato"],400);
        }
        return response(['response'=>'contato Inativado com sucesso']);
    }
}
