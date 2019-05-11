<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
Use Helpers;

class GaleriaController extends Controller
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

        $galeria = \App\Galeria::where('bo_ativo', true)->get();
        if(!$galeria){
            return response(["response"=>"Não existe galeria"],400);
        }
        return response($galeria);
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
        if($img = Helpers::salveFile($request,'galeria')){
            $request['img'] = $img;
        }
        $galeria = \App\Galeria::create($request->all());
        if(!$galeria){
            return  response(["response"=>"Erro ao salvar galeria"],400); 
        }
        return response(["response"=>"Salvo com sucesso",'ar'=>$galeria]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeria =\App\Galeria::find($id);
        if(!$galeria){
            return response(["response"=>"Não existe depoimento"],400);
        }
        return response($galeria);
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
        $galeria =  \App\Galeria::find($id);
        if(!$galeria){
            return response(['response'=>'galeria Não encontrado'],400);
        }
        $galeria->title =  $request['title'];
        $galeria->subtitle =  $request['subtitle'];
        if($img = Helpers::salveFile($request,'galeria')){
            $galeria->img = $img;
        }

        if(!$galeria->update()){
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
        $galeria =  \App\Galeria::find($id);
        if(!$galeria){
            return response(['response'=>'galeria Não encontrado'],400);
        }
        $galeria->bo_ativo = false;
        if(!$galeria->save()){
            return response(["response"=>"Erro ao deletar galeria"],400);
        }
        return response(['response'=>'galeria Inativado com sucesso']);
    }
}
