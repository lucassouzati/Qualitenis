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
