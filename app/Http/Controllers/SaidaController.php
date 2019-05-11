<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Helpers;
class SaidaController extends Controller
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
        $saida = \DB::select("select c.nome ,c.id as id_pessoa,s.dt_saida,COALESCE(SUM(COALESCE(vl_produto,0) + COALESCE(vl_servico,0)),0) as total_saida,s.bo_ativo,c.cpf,s.id_saida from saida s
        left join saida_produto sp on(sp.id_saida = s.id_saida)
        left join saida_servico ss on(ss.id_saida = s.id_saida)
        join cliente c on(s.id_cliente = c.id)
        where s.bo_ativo = true
        GROUP by c.nome ,c.id,s.dt_saida,s.bo_ativo,c.cpf,s.id_saida order by s.id_saida DESC;   
        ");

        if(!$saida){
            return response(["response"=>"Não existe saida"],400);
        }
        return response($saida);
    }

    public function search(Request $request)
    {
        $saida = \DB::select("select c.nome ,c.id as id_pessoa,s.dt_saida,COALESCE(SUM(COALESCE(vl_produto,0) + COALESCE(vl_servico,0)),0) as total_saida,s.bo_ativo,c.cpf,s.id_saida from saida s
        left join saida_produto sp on(sp.id_saida = s.id_saida)
        left join saida_servico ss on(ss.id_saida = s.id_saida)
        join cliente c on(s.id_cliente = c.id)
        where c.nome LIKE '%{$request['search']}%' 
        or c.cpf LIKE '%{$request['search']}%' 
        or c.telefone LIKE '%{$request['search']}%' 
        AND s.bo_ativo = true
        GROUP by c.nome ,c.id,s.dt_saida,s.bo_ativo,c.cpf,s.id_saida   
        order by s.id_saida DESC");
       
        
        if(!$saida){
            return response(["response"=>"Não existe saida"],400);
        }
        return response($saida);
    }

    public function getFormasDePagamento()
    {
        $forma_pagamento = \DB::table('forma_pagamento')
        ->where('bo_ativo',1)
        ->get(['*']);
        
        if(!$forma_pagamento){
            return response(["response"=>"Formas de pagamento Não existe "],400);
        }
        return response($forma_pagamento);
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
            return $this->processarSaida($request);
    }
    
    public function processarSaida($request){
        $ar_valoresFKproduto = []; 
        $ar_valoresFKdespesa = []; 
        $ar_valoresFKservico = []; 
        $ar_valoresPK = [];
        $total = 0;
        $desc = 0;
        $qt_parcela = 0;
        $juros = 0;
        $umaParcela = false;
        $credito = false;
        $tipo_saida = '';

        foreach($request->all() as $key => $value){
       
            // $ar_valoresPK['id_usuario']= $this->token->;
            $ar_valoresPK['id_usuario']= 1;
            $ar_valoresPK['id_cliente']= $value['id_cliente'];
            $ar_valoresPK['tipo_saida']= $value['tipo_saida'];
            $ar_valoresPK['observacao']= $value['observacao'];
            if($value['tipo_saida'] === "AVISTA" || $value['tipo_saida'] === "DEB"){
                $umaParcela = true;
            }
            if($value['tipo_saida'] === "CRED"){
                $credito = true;
            }
            $tipo_saida = $value['tipo_saida'];

            // 'id_saidaproduto','vl_produto','qt_produto','id_saida','vl_desconto',"id_produto"
            if(!empty($value['id_produto'])){
                $ar_valoresFKproduto[$key]['id_produto'] = $value['id_produto'];
                $ar_valoresFKproduto[$key]['vl_produto'] = $value['vl_venda'];
                $ar_valoresFKproduto[$key]['qt_produto'] = $value['qt_produto'];
                $ar_valoresFKproduto[$key]['vl_desconto'] = $value['vl_desconto'];
            }

            // 'id_saidaservico','ds_servico','id_saida','qt_servico','vl_desconto',"vl_servico"
            if(!empty($value['ds_servico']) && empty($value['id_produto'])){
                $ar_valoresFKservico[$key]['ds_servico'] = $value['ds_servico'];
                $ar_valoresFKservico[$key]['qt_servico'] = $value['qt_produto'];
                $ar_valoresFKservico[$key]['vl_desconto'] = $value['vl_desconto'];
                $ar_valoresFKservico[$key]['vl_servico'] = $value['vl_venda'];
                $ar_valoresFKservico[$key]['dt_entrega'] = $value['dt_entrega'];
            }

            // 'id_saidadespesa','ds_despesa','id_saida','qt_despesa',"vl_despesa",'id_pessoaresponsavel'
            // if(!empty($value['ds_despesa'])){
            //     $ar_valoresFKservico[$key]['ds_despesa'] = $value['ds_despesa'];
            //     $ar_valoresFK[$key]['qt_despesa'] = $value['qt_despesa'];
            //     $ar_valoresFK[$key]['vl_despesa'] = $value['vl_despesa'];
            //     $ar_valoresFK[$key]['id_pessoaresponsavel'] = 1;
            // }

            $total += $value['vl_venda'] * $value['qt_produto'];
            $desc += $value['vl_desconto'];
            $qt_parcela = $value['qt_dividir'];

           
        }
        $saida = \App\Saida::create($ar_valoresPK);

        if(count($ar_valoresFKproduto) > 0){
            foreach($ar_valoresFKproduto as $key => $value){
                $value['id_saida'] = $saida->id_saida;
              $saidaProduto = \App\SaidaProduto::create($value);
            }
        }

        // if(count($ar_valoresFKdespesa) > 0){
        //     foreach($ar_valoresFKdespesa as $key => $value){
        //         $value['id_saida'] = $saida->id_saida;
        //       $saidaItem = \App\SaidaDespesa::create($value);
        //     }
        // }

        if(count($ar_valoresFKservico) > 0){
            foreach($ar_valoresFKservico as $key => $value){
                $value['id_saida'] = $saida->id_saida;
              $saidaServico = \App\SaidaServico::create($value);
            }
        }
        $ar_parcela = ['id_saida'=>$saida->id_saida,'tipo_parcela' => $tipo_saida];
        $idParcela = \App\Parcela::create($ar_parcela);

        // 'id_parcela','id_saida','bo_ativo','tipo_parcela',
        
        // 'id_parcelapagamento','vl_parcela','porcento_juros','bo_ativo','bo_pago',"dt_vencimento",'id_parcela', dt_pagamento
        $dia = 30;
        $parcela = ($total - $desc) / $qt_parcela;
        $parFloat = number_format($parcela,2,'.',"");
        
        if(!$credito){
            if($umaParcela){
                $arParcelaUnica = ['vl_parcela'=>(float) $total,'dt_pagamento' => date('Y/m/d'),'dt_vencimento' =>date('Y/m/d'),'bo_pago'=>true,'id_parcela'=>$idParcela->id_parcela,'porcento_juros' => $juros];
                $parcelaPagamento = \App\ParcelaPagamento::create($arParcelaUnica);
            }else{
                for($i = 0;$i < $qt_parcela;$i++){
                    $arParcela = ['id_parcela'=>$idParcela->id_parcela,'vl_parcela'=>(float) $parFloat,'dt_vencimento' => date('Y/m/d' ,strtotime("+$dia days")),'bo_pago'=>false, 'porcento_juros' => 0];
                    $parcelaPagamento = \App\ParcelaPagamento::create($arParcela);
                    $dia += 31;
                }
            }
        }else{
            for($i = 0;$i < $qt_parcela;$i++){
                $arParcela = ['id_parcela'=>$idParcela->id_parcela,'vl_parcela'=>(float) $parFloat,'dt_vencimento' => date('Y/m/d' ,strtotime("+$dia days")),'bo_pago'=>true, 'porcento_juros' => 0];
                $parcelaPagamento = \App\ParcelaPagamento::create($arParcela);
                $dia += 31;
            }

        }

        return $saida;
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $saida = \DB::select("select u.nome as nome_usuario,s.dt_saida,s.id_saida,s.id_usuario,c.id,c.nome,p.tipo_parcela,c.id as id_cliente,count(pg.id_parcelapagamento) as qt_parcela from saida s
		join cliente c on(c.id = s.id_cliente)
		join users u on(u.id = s.id_usuario)
		join parcela p on(p.id_saida = s.id_saida)
		join parcela_pagamento pg on(pg.id_parcela = p.id_parcela)
        where s.id_saida = {$id}
        GROUP by s.id_saida,s.id_usuario,c.id,p.tipo_parcela;");

        $saida_calculo_produto = \DB::select("select SUM(COALESCE(sp.vl_produto,0)) as total_produto,SUM(COALESCE(sp.vl_desconto,0)) as desconto_produto ,SUM(COALESCE(sp.qt_produto,0)) as qt_produto from saida s
        left join saida_produto sp on(sp.id_saida = s.id_saida)
        where s.id_saida = {$id};");

        $saida_calculo_servico = \DB::select("select SUM(COALESCE(ss.vl_servico,0)) as total_servico,SUM(COALESCE(ss.vl_desconto,0)) as desconto_servico,SUM(COALESCE(ss.qt_servico,0)) as qt_servico from saida s
        left join saida_servico ss on(ss.id_saida = s.id_saida)
        where s.id_saida = {$id};");

        $total = $saida_calculo_produto[0]->total_produto + $saida_calculo_servico[0]->total_servico;
        $total_desconto = $saida_calculo_produto[0]->desconto_produto + $saida_calculo_servico[0]->desconto_servico;
        $qt_produto_servico = $saida_calculo_produto[0]->qt_produto + $saida_calculo_servico[0]->qt_servico;

        $saida_produto = \App\Saida::leftJoin('saida_produto', 'saida.id_saida', '=', 'saida_produto.id_saida')
            ->leftJoin('produto', 'produto.id', '=', 'saida_produto.id_produto')
            ->where('saida_produto.id_saida','=',$id)
            ->get(['*']);

        $saida_servico = \App\Saida::leftJoin('saida_servico', 'saida.id_saida', '=', 'saida_servico.id_saida')
            ->where('saida_servico.id_saida','=',$id)
            ->get(['*']);

        if(!$saida){
            return response(["response"=>"Não existe saida"],400);
        }
        return response(['saida' => $saida,'saida_produto' => $saida_produto,'saida_servico' => $saida_servico,'total' => $total,'total_desconto' => $total_desconto,'qt_produto_servico' => $qt_produto_servico]);
    }

    // pegar parcelar por id_sadia

    public function getParcelas($id)
    {
        $parcela = \App\SaidaParcela::where('id_saida','=',$id)
            ->get();
        if(!$parcela){
            return response(["response"=>"Não existe Parcela"],400);
        }
        return response($parcela);
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
        \App\SaidaItem::where('id_saida', '=', $id)->delete();
        \App\SaidaParcela::where('id_saida', '=', $id)->delete();
        \App\Saida::where('id','=',$id)->delete();
        return $this->processarSaida($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saida =  \App\Saida::find($id);
        if(!$saida){
            return response(['response'=>'saida Não encontrado'],400);
        }
        $saida->bo_ativo = false;
        if(!$saida->save()){
            return response(["response"=>"Erro ao deletar saida"],400);
        }
        return response(['ok'=>'saida Inativado com sucesso']);
    }
}
