<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;

class FreePagesController extends Controller
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

        $page = \App\FreePages::all();
        if(!$page){
            return response(["response"=>"Não existe page"],400);
        }
        return response($page);
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
        
        $request['is_active'] = true;

        $page = \App\FreePages::create($request->all());
        if(!$page){
            return  response(["response"=>"Erro ao salvar page"],400); 
        }
        return response(["response"=>"Salvo com sucesso",'ar'=>$page]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page =\App\FreePages::find($id);
        if(!$page){
            return response(["response"=>"Não existe page"],400);
        }
        return response($page);
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
        $page =  \App\FreePages::find($id);
        if(!$page){
            return response(['response'=>'page Não encontrado'],400);
        }
        $page->title_seo =  $request['title_seo'];
        $page->description_seo =  $request['description_seo'];
        $page->keywords_seo =  $request['keywords_seo'];
        $page->title =  $request['title'];
        $page->subtitle =  $request['subtitle'];
        $page->url =  $request['url'];
        $page->content =  $request['content'];
        $page->sort_order =  $request['sort_order'];

        if(!$page->update()){
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
        $page =  \App\FreePages::find($id);
        if(!$page){
            return response(['response'=>'page Não encontrado'],400);
        }
        $page->bo_ativo = false;
        if(!$page->save()){
            return response(["response"=>"Erro ao deletar page"],400);
        }
        return response(['response'=>'page Inativado com sucesso']);
    }
}
