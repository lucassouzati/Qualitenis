<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//tenista
Route::get('/tenista', ['uses'=>'TenistaController@index', 'as'=>'tenista.index']);
Route::get('/tenista/adicionar', ['uses'=>'TenistaController@adicionar', 'as'=>'tenista.adicionar']);
Route::post('/tenista/salvar', ['uses'=>'TenistaController@salvar', 'as'=>'tenista.salvar']);
Route::get('/tenista/editar/{id}', ['uses'=>'TenistaController@editar', 'as'=>'tenista.editar']);
Route::get('/tenista/deletar/{id}', ['uses'=>'TenistaController@deletar', 'as'=>'tenista.deletar']);
Route::put('/tenista/atualizar/{id}', ['uses'=>'TenistaController@atualizar', 'as'=>'tenista.atualizar']);


Route::get('/torneio', ['uses'=>'TorneioController@index', 'as'=>'torneio.index']);
Route::get('/torneio/adicionar', ['uses'=>'TorneioController@adicionar', 'as'=>'torneio.adicionar']);
Route::post('/torneio/salvar', ['uses'=>'TorneioController@salvar', 'as'=>'torneio.salvar']);
Route::get('/torneio/editar/{id}', ['uses'=>'TorneioController@editar', 'as'=>'torneio.editar']);
Route::get('/torneio/deletar/{id}', ['uses'=>'TorneioController@deletar', 'as'=>'torneio.deletar']);
Route::put('/torneio/atualizar/{id}', ['uses'=>'TorneioController@atualizar', 'as'=>'torneio.atualizar']);
Route::get('/torneio/detalhe/{id}', ['uses'=>'TorneioController@detalhe', 'as'=>'torneio.detalhe']);


//torneio
/*
Route::get('/Torneio', ['uses'=>'TorneioController@index', 'as'=>'Torneio.index']);
Route::get('/Torneio/adicionar', ['uses'=>'TorneioController@adicionar', 'as'=>'Torneio.adicionar']);
Route::post('/Torneio/salvar', ['uses'=>'TorneioController@salvar', 'as'=>'Torneio.salvar']);
Route::get('/Torneio/editar/{id}', ['uses'=>'TorneioController@editar', 'as'=>'Torneio.editar']);
Route::get('/Torneio/deletar/{id}', ['uses'=>'TorneioController@deletar', 'as'=>'Torneio.deletar']);
Route::put('/Torneio/atualizar/{id}', ['uses'=>'TorneioController@atualizar', 'as'=>'Torneio.atualizar']);
*/
//chaveamento

Route::group(['prefix' => 'torneio/{torneio}'], function(){
	
	Route::get('/chaveamento', ['uses'=>'ChaveamentoController@index', 'as'=>'chaveamento.index']);
	Route::get('/chaveamento/adicionar', ['uses'=>'ChaveamentoController@adicionar', 'as'=>'chaveamento.adicionar']);
	Route::post('/chaveamento/salvar', ['uses'=>'ChaveamentoController@salvar', 'as'=>'chaveamento.salvar']);
	Route::get('/chaveamento/editar/{chaveamento}', ['uses'=>'ChaveamentoController@editar', 'as'=>'torneio.chaveamento.editar']);
	Route::get('/chaveamento/deletar/{id}', ['uses'=>'ChaveamentoController@deletar', 'as'=>'chaveamento.deletar']);
	Route::put('/chaveamento/atualizar/{id}', ['uses'=>'ChaveamentoController@atualizar', 'as'=>'chaveamento.atualizar']);	
	Route::get('/chaveamento/detalhe/{id}', ['uses'=>'ChaveamentoController@editar', 'as'=>'chaveamento.detalhe']);
});


//academia
Route::get('/Academia/index', ['uses'=>'AcademiaController@index', 'as'=>'academia.index']);
Route::get('/Academia/adicionar', ['uses'=>'AcademiaController@adicionar', 'as'=>'Academia.adicionar']);
Route::post('/Academia/salvar', ['uses'=>'AcademiaController@salvar', 'as'=>'Academia.salvar']);
Route::get('/Academia/editar/{id}', ['uses'=>'AcademiaController@editar', 'as'=>'Academia.editar']);
Route::put('/Academia/atualizar/{id}', ['uses'=>'AcademiaController@atualizar', 'as'=>'Academia.atualizar']);


//classe
Route::get('/Classe/index', ['uses'=>'ClasseController@index', 'as'=>'classe.index']);
Route::get('/Classe/adicionar', ['uses'=>'ClasseController@adicionar', 'as'=>'Classe.adicionar']);
Route::post('/Classe/salvar', ['uses'=>'ClasseController@salvar', 'as'=>'Classe.salvar']);
Route::get('/Classe/editar/{id}', ['uses'=>'ClasseController@editar', 'as'=>'Classe.editar']);
Route::put('/Classe/atualizar/{id}', ['uses'=>'ClasseController@atualizar', 'as'=>'Classe.atualizar']);
Route::auth();

Route::get('/home', 'HomeController@index');

