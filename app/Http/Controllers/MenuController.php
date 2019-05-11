<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
Use Helpers;

class MenuController extends Controller
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

        $menu = \App\Menu::all();
        if(!$menu){
            return response(["response"=>"Não existe menu"],400);
        }
        return response($menu);
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
        $Menu = \App\Menu::create($request->all());
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
        $Menu =\App\Menu::find($id);
        if(!$Menu){
            return response(["response"=>"Não existe Menu"],400);
        }
        return response($Menu);
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
        $menu =  \App\Menu::find($id);
        if(!$menu){
            return response(['response'=>'Menu Não encontrado'],400);
        }
        $menu->title =  $request['title'];
        $menu->subtitle =  $request['subtitle'];
        $menu->order_sort =  $request['order_sort'];

        if(!$menu->update()){
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
        $menu =  \App\Menu::find($id);
        if(!$menu){
            return response(['response'=>'Menu Não encontrado'],400);
        }
        $menu->bo_ativo = false;
        if(!$menu->save()){
            return response(["response"=>"Erro ao deletar Menu"],400);
        }
        return response(['response'=>'Menu Inativado com sucesso']);
    }
}
