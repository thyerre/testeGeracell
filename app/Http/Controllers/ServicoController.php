<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
Use Helpers;

class ServicoController extends Controller
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

        $servico = \App\Servico::where('bo_ativo', true)->get();
        if(!$servico){
            return response(["response"=>"Não existe servico"],400);
        }
        return response($servico);
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
        if($img = Helpers::salveFile($request,'servico')){
            $servico['img'] = $img;
        }

        $Menu = \App\Servico::create($request->all());
        
        if(!$Menu){
            return  response(["response"=>"Erro ao salvar Menu"],400); 
        }
        return response(["response"=>"Salvo com sucesso",'ar'=>$Menu]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico =\App\Servico::find($id);
        if(!$servico){
            return response(["response"=>"Não existe servico"],400);
        }
        return response($servico);    
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
        $servico =  \App\Servico::find($id);
        if(!$servico){
            return response(['response'=>'Menu Não encontrado'],400);
        }
        $servico->title =  $request['title'];
        $servico->subtitle =  $request['subtitle'];
        $servico->background_color =  $request['background_color'];
        if($img = Helpers::salveFile($request,'servico')){
            $servico->img = $img;
        }

        if(!$servico->update()){
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
        $servico =  \App\Servico::find($id);
        if(!$servico){
            return response(['response'=>'serviço Não encontrado'],400);
        }
        $servico->bo_ativo = false;
        if(!$servico->save()){
            return response(["response"=>"Erro ao deletar serviço"],400);
        }
        return response(['response'=>'serviço Inativado com sucesso']);
    }
}
