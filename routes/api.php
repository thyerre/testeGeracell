<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route:: post('auth/login','AuthController@login');
Route::get('auth/logout', 'AuthController@logout');
Route::post('auth/refresh', 'AuthController@refresh');

Route::group(['middleware'=>'jwt.auth'], function(){
    Route::resource('saida','SaidaController');
    Route::get('forma/pagamento','SaidaController@getFormasDePagamento');
    Route::get('parcela-saida/{id}','ParcelaController@getParcelas');
    Route::get('pagar/parcela/{id}','ParcelaController@pagarParcelas');
    Route::post('saida/savepk','SaidaController@savePk');
    Route::post('saida/search','SaidaController@search');
    Route::post('cliente/search','ClienteController@search');
    Route::resource('parcela','ParcelaController');
    Route::post('parcela/search','ParcelaController@search');
    Route::resource('cliente','ClienteController');
    Route::resource('produto','ProdutoController');
    Route::resource('user','UsuarioController');
    Route:: post('new/user','UsuarioController@store');
    Route::resource('galeria','GaleriaController');
    Route::resource('contato-cliente','ContatoClienteController');
    Route::resource('contato','ContatoController');
    Route::resource('conf','SettingsController');
    Route::resource('freepages','FreePagesController');
    Route::resource('depoimento','DepoimentoController');
    Route::resource('porque','PorqueController');
    Route::resource('suporte','SuporteController');
    Route::resource('time','TimeController');
    Route::resource('rodape','RodapeController');
    Route::resource('servico','ServicoController');
    Route::resource('menu','MenuController');
    Route::resource('favorito','FavoritoController');
    Route::get('auth/me', 'AuthController@me');
    Route::resource('categoria','CategoriaController');
    Route::resource('link','LinkController');
    Route::resource('about','AboutController');
    Route::resource('content_about','ContentAboutController');
    Route::resource('list_content','ListContentController');
    Route::resource('cabecalho','CabecalhoController');
    Route::resource('fornecedor','FornecedorController');

});
