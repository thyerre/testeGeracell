<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Helpers;
class FornecedorController extends Controller
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

        $fornecedor = \App\Fornecedor::orderby('id','DESC')->get();
        if(!$fornecedor){
            return response(["response"=>"Não existe fornecedor"],400);
        }
        return response($fornecedor);
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
            if($img = Helpers::salveFile($request,'fornecedor')){
                return response(["response"=>"imagem movida com sucesso",'file'=>$img['file']]);
            }
        }else{
            $request['img'] = $request['fileimg'];
            $request['bo_ativo'] = true;
            $fornecedor = \App\Fornecedor::create($request->all());
            if(!$fornecedor){
                return  response(["response"=>"Erro ao salvar Fornecedor"],400); 
            }
            return response(["response"=>"Salvo com sucesso",'ar'=>$fornecedor]);
        }
        return response(["response"=>"Error",'ar'=>$fornecedor]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor =\App\Fornecedor::find($id);
        if(!$fornecedor){
            return response(["response"=>"Não existe fornecedor"],400);
        }
        return response($fornecedor);    
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
        
        $fornecedor =  \App\Fornecedor::find($id);
        if(!$fornecedor){
            return response(['response'=>'depoimento Não encontrado'],400);
        }
        $fornecedor = Helpers::processarColunasUpdate($fornecedor,$request->all());
        
        if(!$fornecedor->update()){
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
        $fornecedor =  \App\Fornecedor::find($id);
        if(!$fornecedor){
            return response(['response'=>'fornecedor Não encontrado'],400);
        }
        $fornecedor->bo_ativo = false;
        if(!$fornecedor->save()){
            return response(["response"=>"Erro ao deletar fornecedor"],400);
        }
        return response(['ok'=>'fornecedor Inativado com sucesso']);
    }
}
