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
