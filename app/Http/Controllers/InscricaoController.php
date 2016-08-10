<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Inscricao;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        
    	$tenista = \App\Tenista::find($request->get('tenista_id'));
    	$chaveamento = \App\Chaveamento::find($request->get('chaveamento_id'));
		$torneio = \App\Torneio::find($request->get('torneio_id'));

		//Verificar se classe do tenista é a mesma que do chaveamento, se não for, retorna erro
    	if($tenista->classe->id <> $chaveamento->classe->id){
    		\Session::flash('flash_message',[
            'msg'=>"Chaveamento permitido apenas para tenistas de ". $chaveamento->classe->nome.".",
            'class'=>"alert-danger"
        	]);
			return redirect()->route('torneio.ver', $torneio->id);    		
    	}

    	//Gerando prazo de pagamento de 3 dias antes da data do torneio
        $data = new \DateTime($torneio->data);
		$data->modify('-3 day');
       	$dados = $request->all();
       	$dados = array_add($dados, 'prazodepagamento', $data->format('Y-m-d'));
       	
       	//Adicionando outras informações
       	$dados = array_add($dados, 'pago', 0);
       	$dados = array_add($dados, 'status', 'Aguardando Pagamento');
       

       Inscricao::create($dados);

       \Session::flash('flash_message',[
            'msg'=>"Inscrição realizada com sucesso! Para confirmá-la, realize o pagamento do valor com um administrador.",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.ver', $torneio->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function adicionar(){

    }

    public function editar($id){

    }

    public function cancela($id){
    	$inscricao = \App\Inscricao::find($id);
    	$inscricao->status = 'Cancelada';
    	$inscricao->update();

    	\Session::flash('flash_message',[
            'msg'=>"Inscrição cancelada com sucesso! Você ainda pode se inscrever no torneio.",
            'class'=>"alert-success"
        ]);

    	return redirect()->route('torneio.ver', $inscricao->torneio->id);
    }
}
