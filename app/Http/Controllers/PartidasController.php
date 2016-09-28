<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Chaveamento;
use App\Torneio;
use App\Partida;
use DB;

class PartidasController extends Controller
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
    public function create($torneio_id, $chaveamento_id)
    {
        //
        $torneio = Torneio::find($torneio_id);
        $chaveamento = Chaveamento::find($chaveamento_id);
        $inscricoes = $chaveamento->inscricoes;
        //dd($inscricoes);
        $partidas =  $chaveamento->partidas()->nivel(1)->get();
        $partidasnivel2 =  $chaveamento->partidas()->nivel(2)->get();
        $partidasnivel3 =  $chaveamento->partidas()->nivel(3)->get();
        $partidasnivel4 =  $chaveamento->partidas()->nivel(4)->get();
        $partidasnivel5 =  $chaveamento->partidas()->nivel(5)->get();
        $partidasdefinidas =  $chaveamento->partidas()->definidas();
        //dd($partidas);



        $status = DB::select(DB::raw('SHOW COLUMNS FROM partidas WHERE Field = "status"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $status, $matches);

         $enum = array();
         foreach( explode(',', $matches[1]) as $value )
         {
           $v = trim( $value, "'" );
           $enum = array_add($enum, $v, $v);
         }
        //dd($enum);

        return view('torneio.chaveamento.partidas.adicionar', compact('torneio', 'chaveamento', 'inscricoes', 'partidas', 'enum', 'partidasdefinidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @readdir()turn \Illuminate\Http\Response
     */
    public function store($torneio_id, $chaveamento_id, Request $request)
    {
        //
        
        $this->validate($request, [
            'status' => 'required',
            'data' => 'required|date_format:j/m/Y',
        ]);


        if($request->get('jogador1_id') == $request->get('jogador2_id'))
        {
            return back()->withErrors(['Jogador 1 e jogador 2 não pode ser iguais']);
        }

        $dados = $request->all();
        $dados = array_add($dados, 'chaveamento_id', $chaveamento_id);

        if($dados['setjogador1'] > $dados['setjogador2'])
            $dados = array_add($dados, 'vencedor', 'Jogador 1');            
        elseif($dados['setjogador1'] < $dados['setjogador2'])
            $dados = array_add($dados, 'vencedor', 'Jogador 2');            
        else
            $dados = array_add($dados, 'vencedor', 'Empate');            
        
        //dd($dados);
        Partida::create($dados);   

        \Session::flash('flash_message',[
            'msg'=>"Partida criada com sucesso",
            'class'=>"alert-success"
        ]);

        return redirect()->route('partidas.create', ['torneio' => $torneio_id, 'chaveamento' => $chaveamento_id]);
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
    public function update(Request $request, $torneio_id, $chaveamento_id, $id)
    {
        $partida = Partida::find($id);
        

        $this->validate($request, [
            'partida_id' => 'required',
            'data' => 'required|date_format:j/m/Y',
            'jogador1_id' => 'required',
            'jogador2_id' => 'required',
            'status' => 'required',
            ]);

        
        //dd($partida->update($request->all()));
        $dados = $request->all();
        $date = date_create_from_format('j/m/Y', $request->input('data'));
        $dados = array_set($dados, 'data', date_format($date, 'Y-m-d'));

        $partida->update($dados);
        
        \Session::flash('flash_message',[
            'msg'=>"Partida atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return back();
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

    public function detalhe($torneio_id, $chaveamento_id, $id)
    {
        $partida = Partida::find($id);

        return view('torneio.chaveamento.partidas.detalhe', compact('partida'));
    }

     public function retornaPartidaAjax(Request $request) {
        $query = $request->get('id','');
        
        $partida = Partida::find($query);
        
        if($partida != null){

        $retorno[]=array('data'=> $partida->data, 
                            'id'=>$partida->id, 
                            'jogador1_id' => $partida->jogador1_id,
                            'jogador2_id' => $partida->jogador2_id,
                            'setjogador2' => $partida->setjogador2,
                            'setjogador1' => $partida->setjogador1,
                            'status' => $partida->status,

                            );
             return $retorno;
         }
        else
            return ['value'=>'No Result Found','id'=>''];


        
        
    }
}
