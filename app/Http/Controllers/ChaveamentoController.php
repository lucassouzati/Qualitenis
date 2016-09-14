<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChaveamentoController extends Controller
{
    //
    public function adicionar($torneio_id){
      $torneio = \App\Torneio::find($torneio_id);
      return view('torneio.chaveamento.adicionar', compact('torneio'));
    }

     public function editar($torneio_id, $id)
    {
        $torneio = \App\Torneio::find($torneio_id);
        $chaveamento = \App\Chaveamento::find($id);
        return view('torneio.chaveamento.editar', compact('torneio'), compact('chaveamento'));
    }

    public function salvar(Request $request){
       
      $this->validar($request);
      //vagas é igual ao número de jogadores
      $dados = array_add($request->all(), 'vagas', $request->get('numerodejogadores'));
      $chaveamento = \App\Chaveamento::create($dados);

      $torneio = \App\Torneio::find($chaveamento->torneio->id);
      $torneio->numerodechaveamentos++;
      $torneio->update();

      return redirect()->route('torneio.detalhe', $chaveamento->torneio->id);        
    }

   public function atualizar(Request $request, $torneio_id,   $id) 	{
      $this->validar($request);


      //$inscricoes = \App\Inscricao::where('chaveamento_id', $id);
   		$chaveamento = \App\Chaveamento::find($id);

      $inscricoes = $chaveamento->inscricoes;
      $chaveamento->dupla = $request->get('dupla');
      $chaveamento->numerodejogadores = $request->get('numerodejogadores');
      $chaveamento->minutosestimadosdepartida = $request->get('minutosestimadosdepartida');
      $chaveamento->qtdset = $request->get('qtdset');
      $chaveamento->qtdgameporset = $request->get('qtdgameporset');
      $chaveamento->update();

   		\Session::flash('flash_message',[
            'msg'=>"Chaveamento atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);
      $torneio = \App\Chaveamento::find($id)->torneio;
        return redirect()->route('torneio.detalhe' , compact('torneio'));        
   }

   public function deletar($torneio_id, $id){
      $chaveamento = \App\Chaveamento::find($id);

      $torneio = \App\Torneio::find($chaveamento->torneio->id);
      $torneio->numerodechaveamentos--;
      $torneio->update();

      \App\Inscricao::where('chaveamento_id', $chaveamento->id)->delete();
      $chaveamento->delete();

        \Session::flash('flash_message',[
            'msg'=>"Chaveamento excluído com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.detalhe', $chaveamento->torneio->id);
   }

  public function validar(Request $request){
         $this->validate($request, [
            'classe_id' => 'required|numeric',
            'numerodejogadores' => 'required|integer|min:2',
            'minutosestimadosdepartida' => 'required|integer|min:1',
            'qtdset' => 'required|integer|min:1',
            'qtdgameporset' => 'required|integer|min:1',
            
        ]);
    }
}
