<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Helpers;

class UsuarioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Usuario::all();
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
            if($img = Helpers::salveFile($request,'user')){
                return response(["response"=>"imagem movida com sucesso",'file'=>$img['file']]);
            }
        }else{
            $request['img'] = $request['fileimg'];
            $request['bo_ativo'] = true;
            $user = \App\Usuario::create($request->all());
            if(!$user){
                return  response(["response"=>"Erro ao salvar Usuario"],400); 
            }
            return response(["response"=>"Salvo com sucesso",'ar'=>$user]);
        }
        return response(["response"=>"Error",'ar'=>$user]);

        $request['password']  = bcrypt($request['password']);
        $request['bo_ativo']  = true;
        return \App\Usuario::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo =  \App\Usuario::find($id);
        if(!$tipo){
            return response(["response"=>"Tipo não encontrado"],400);
        }
        return $tipo;
        // return \App\Usuario::where('id_tipo_despesa','>', $id)->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $user =  \App\Usuario::find($id);
        if(!$user){
            return response(['response'=>'user Não encontrado'],400);
        }
        $User = Helpers::processarColunasUpdate($user,$request->all());
        // return $User;
        // return $request;
        if(!$User->update()){
            return response(['response'=>'Erro ao alterar'],400);
        }
        $user =  \App\Usuario::find($id);
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
        // return \App\Usuario::destroy($id);
        // ou 
        $tipo =  \App\Usuario::find($id);
        if(!$tipo){
            return response(['response'=>'Tipo Não encontrado'],400);
        }
        $tipo->delete();
        return response(['response'=>'Deletado com sucesso']);
    }
}
