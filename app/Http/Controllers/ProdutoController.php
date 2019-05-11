<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Helpers;
class ProdutoController extends Controller
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

        $produto = \App\Produto::orderby('id','DESC')->get();
        if(!$produto){
            return response(["response"=>"Não existe produto"],400);
        }
        return response($produto);
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
        if ($request->hasFile('fileimg')) {
            if($img = Helpers::salveFile($request,'produto')){
                return response(["response"=>"imagem movida com sucesso",'file'=>$img['file']]);
            }
        }else{
            $request['img'] = $request['fileimg'];
            $request['bo_ativo'] = true;
            $produto = \App\Produto::create($request->all());
            if(!$produto){
                return  response(["response"=>"Erro ao salvar Produto"],400); 
            }
            return response(["response"=>"Salvo com sucesso",'ar'=>$produto]);
        }
        return response(["response"=>"Error",'ar'=>$produto]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto =\App\Produto::find($id);
        if(!$produto){
            return response(["response"=>"Não existe produto"],400);
        }
        return response($produto);    
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
        
        $produto =  \App\Produto::find($id);
        if(!$produto){
            return response(['response'=>'depoimento Não encontrado'],400);
        }
        $produto = Helpers::processarColunasUpdate($produto,$request->all());
        
        if(!$produto->update()){
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
        $produto =  \App\Produto::find($id);
        if(!$produto){
            return response(['response'=>'produto Não encontrado'],400);
        }
        $produto->bo_ativo = false;
        if(!$produto->save()){
            return response(["response"=>"Erro ao deletar produto"],400);
        }
        return response(['ok'=>'produto Inativado com sucesso']);
    }
}
