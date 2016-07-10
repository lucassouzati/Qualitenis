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
        //$chaveamento = \App\Chaveamento::create($request->all());
       $chaveamento = new \App\Chaveamento;
        $chaveamento->numerodejogadores = $request->get('numerodejogadores');
        $chaveamento->classe()->associate(\App\Classe::find($request->get('classe_id')));
        $chaveamento->torneio()->associate(\App\Torneio::find($request->get('torneio_id')));
        $chaveamento->save();
        return redirect()->route('torneio.detalhe', $chaveamento->torneio->id);        
    }

   public function atualizar(Request $request, $torneio_id,   $id) 	{
   		$chaveamento = \App\Chaveamento::find($id);
      $chaveamento->numerodejogadores = $request->get('numerodejogadores');
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

        $chaveamento->delete();

        \Session::flash('flash_message',[
            'msg'=>"Chaveamento excluído com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.detalhe', $chaveamento->torneio->id);
   }
}
