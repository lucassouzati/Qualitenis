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


Route::get('/home', function(){
	return view('home');
});

Route::get('/noticias', function(){
	return view('noticias/noticias');
});


//Noticias
Route::post('noticias/noticias', ['uses'=>'NoticiaController@salvar', 'as'=>'Noticia.salvar']);
Route::get('/noticias/exibir', ['uses'=>'NoticiaController@exibir', 'as'=>'Noticias.exibir']);


//tenista
//Route::get('/tenista', ['uses'=>'TenistaController@index', 'as'=>'tenista.index']);
Route::get('/tenista/adicionar', ['uses'=>'TenistaController@adicionar', 'as'=>'tenista.adicionar']);
Route::post('/tenista/salvar', ['uses'=>'TenistaController@salvar', 'as'=>'tenista.salvar']);

//Route::get('/tenista/deletar/{id}', ['uses'=>'TenistaController@deletar', 'as'=>'tenista.deletar']);
Route::put('/tenista/atualizar/{id}', ['uses'=>'TenistaController@atualizar', 'as'=>'tenista.atualizar']);
Route::get('tenista/activation/{token}', 'TenistaController@activateTenista')->name('tenista.activate');

//pesquisa ajax pra tenista
//Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
Route::get('searchajax',array('as'=>'searchajax','uses'=>'AutoCompleteController@autoComplete'));

Route::get('/estado/{id}/cidades', array('as'=>'listacidadesporestado','uses'=>'CidadeController@getCidadesPorEstado'));


Route::resource('inscricao', 'InscricaoController');
//Route::get('/inscrever', ['uses'=>'InscricaoController@adicionar', 'as'=>'inscricao.lancar']);

Route::get('/torneios/{id}', ['uses'=>'TorneioController@ver', 'as'=>'torneio.ver']);

Route::put('/inscricao/cancela/{id}', ['uses'=>'InscricaoController@cancela', 'as'=>'inscricao.cancela']);
Route::put('/inscricao/trocastatus/{id}', ['uses'=>'InscricaoController@trocaStatus', 'as'=>'inscricao.trocastatus']);



Route::group(['middleware' => 'tenista'], function(){

	Route::group(['middleware' => 'auth:tenista'], function(){

		Route::get('/tenista', ['uses'=> 'TenistaController@index', 'as'=>'tenista.index']);

		Route::put('/tenista/trocastatus/{id}', ['uses'=>'TenistaController@trocaStatus', 'as'=>'tenista.trocastatus']);

		Route::get('/tenista/editar/{id}', ['uses'=>'TenistaController@editar', 'as'=>'tenista.editar']);
	});

	Route::get('/tenista/login', ['uses'=> 'TenistaController@login', 'as' => 'tenista.index']);
	Route::get('/tenista/login', ['uses'=> 'TenistaController@login', 'as' => 'tenista.login']);
	Route::post('/tenista/login', 'TenistaController@postLogin');
	Route::get('/tenista/logout', "TenistaController@logout");
});






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

//academia
/*
Route::get('/Academia/index', ['uses'=>'AcademiaController@index', 'as'=>'academia.index']);
Route::get('/Academia/adicionar', ['uses'=>'AcademiaController@adicionar', 'as'=>'Academia.adicionar']);
Route::post('/Academia/salvar', ['uses'=>'AcademiaController@salvar', 'as'=>'Academia.salvar']);
Route::get('/Academia/editar/{id}', ['uses'=>'AcademiaController@editar', 'as'=>'Academia.editar']);
Route::put('/Academia/atualizar/{id}', ['uses'=>'AcademiaController@atualizar', 'as'=>'Academia.atualizar']);
*/



//dd(Config::Get('mail'));

Route::auth();


Route::group(['middleware' => 'auth'], function () {



	//DESATIVAR FUNCIONARIO
	Route::get('/Auth/desativar/{id}', ['uses'=>'Auth\AuthController@desativar', 'as'=>'Auth.desativar']);
	//EDITAR FUNCIONARIO
	Route::get('/Auth/editar/{id}', ['uses'=>'Auth\AuthController@editar', 'as'=>'Auth.editar']);
	Route::put('/Auth/atualizar/{id}', ['uses'=>'Auth\AuthController@atualizar', 'as'=>'Auth.atualizar']);


	Route::get('register', 'Auth\AuthController@showRegistrationForm');
	Route::post('register', 'Auth\AuthController@registrar');
	Route::get('/Auth/index', ['uses'=>'Auth\AuthController@index', 'as'=>'auth.index']);

	//academia
	Route::get('/Academia/index', ['uses'=>'AcademiaController@index', 'as'=>'Academia.index']);
	Route::get('/Academia/adicionar', ['uses'=>'AcademiaController@adicionar', 'as'=>'Academia.adicionar']);
	Route::post('/Academia/salvar', ['uses'=>'AcademiaController@salvar', 'as'=>'Academia.salvar']);
	Route::get('/Academia/editar/{id}', ['uses'=>'AcademiaController@editar', 'as'=>'Academia.editar']);
	Route::put('/Academia/atualizar/{id}', ['uses'=>'AcademiaController@atualizar', 'as'=>'Academia.atualizar']);

	////classe
	Route::get('/Classe/index', ['uses'=>'ClasseController@index', 'as'=>'classe.index']);
	Route::get('/Classe/adicionar', ['uses'=>'ClasseController@adicionar', 'as'=>'Classe.adicionar']);
	Route::post('/Classe/salvar', ['uses'=>'ClasseController@salvar', 'as'=>'Classe.salvar']);
	Route::get('/Classe/editar/{id}', ['uses'=>'ClasseController@editar', 'as'=>'Classe.editar']);
	Route::put('/Classe/atualizar/{id}', ['uses'=>'ClasseController@atualizar', 'as'=>'Classe.atualizar']);


	//Permisssao - Papel
	Route::get('/Papel/permissoes/{id}', ['uses'=>'PapelController@permissoes', 'as'=>'Papel.permissoes']);
	Route::put('/Papel/addPermissao/{papel_id}', ['uses'=>'PapelController@addPermissao', 'as'=>'Papel.addPermissao']);
		//torneios
	Route::group(['prefix' => 'torneio/{torneio}'], function(){

		Route::get('/chaveamento', ['uses'=>'ChaveamentoController@index', 'as'=>'chaveamento.index']);
		Route::get('/chaveamento/adicionar', ['uses'=>'ChaveamentoController@adicionar', 'as'=>'chaveamento.adicionar']);
		Route::post('/chaveamento/salvar', ['uses'=>'ChaveamentoController@salvar', 'as'=>'chaveamento.salvar']);
		Route::get('/chaveamento/editar/{chaveamento}', ['uses'=>'ChaveamentoController@editar', 'as'=>'torneio.chaveamento.editar']);
		Route::get('/chaveamento/deletar/{id}', ['uses'=>'ChaveamentoController@deletar', 'as'=>'chaveamento.deletar']);

		Route::get('/chaveamento/detalhe/{id}', ['uses'=>'ChaveamentoController@editar', 'as'=>'chaveamento.detalhe']);
		Route::post('/chaveamento/atualizar/{id}', ['uses'=>'ChaveamentoController@atualizar', 'as'=>'chaveamento.atualizar']);

		Route::get('/inscricao/{id?}', ['uses'=>'InscricaoController@index', 'as'=>'inscricao.index']);

		Route::group(['prefix' => 'chaveamento/{chaveamento}'], function(){
				Route::get('/partidas/', ['uses'=>'PartidasController@index', 'as'=>'interesse.index']);
				Route::get('/partidas/create', ['uses'=>'PartidasController@create', 'as'=>'partidas.create']);
				Route::post('/partidas', ['uses'=>'PartidasController@store', 'as'=>'partidas.store']);
				Route::get('/partidas/{id}', ['uses'=>'PartidasController@detalhe', 'as'=>'partidas.detalhe']);
			});
	});



	Route::get('/torneio/adicionar', ['uses'=>'TorneioController@adicionar', 'as'=>'torneio.adicionar']);
	Route::post('/torneio/salvar', ['uses'=>'TorneioController@salvar', 'as'=>'torneio.salvar']);
	Route::get('/torneio/editar/{id}', ['uses'=>'TorneioController@editar', 'as'=>'torneio.editar']);
	Route::get('/torneio/deletar/{id}', ['uses'=>'TorneioController@deletar', 'as'=>'torneio.deletar']);
	Route::put('/torneio/atualizar/{id}', ['uses'=>'TorneioController@atualizar', 'as'=>'torneio.atualizar']);
	Route::put('/torneio/trocastatus/{id}', ['uses'=>'TorneioController@trocaStatus', 'as'=>'torneio.trocastatus']);
	Route::get('/torneio/detalhe/{id}', ['uses'=>'TorneioController@detalhe', 'as'=>'torneio.detalhe']);

	Route::get('/torneio', ['uses'=>'TorneioController@index', 'as'=>'torneio.index']);
	Route::get('/torneio/{id?}', ['uses'=>'TorneioController@detalhe', 'as'=>'torneio.index']);


	//adminsitrador trocando status do tenista


	Route::get('/tenista/lista', ['uses'=>'TenistaController@lista', 'as'=>'tenista.lista']);
	Route::get('/tenista/detalhe/{id}', ['uses'=>'TenistaController@detalhe', 'as'=>'tenista.detalhe']);
	Route::put('/tenista/trocastatusporadmin/{id}', ['uses'=>'TenistaController@trocaStatusPorAdm', 'as'=>'tenista.trocastatusporadmin']);
	Route::put('/tenista/troclasse/{id}', ['uses'=>'TenistaController@trocaClasse', 'as'=>'tenista.trocaclasse']);


	//detalhe tenista para administrador


});




//email
Route::get('Academia/sendEmail', ['uses'=>'AcademiaController@sendEmail', 'as'=>'Academia.email']);
