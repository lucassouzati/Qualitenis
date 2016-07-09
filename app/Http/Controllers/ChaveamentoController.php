<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChaveamentoController extends Controller
{
    //
     public function editar($id)
    {
        $chaveamento = \App\Chaveamento::find($id);
        return view('torneio.chaveamento.editar',compact('chaveamento'));
    }
   public function atualizar(Request $request, $id) 	{
   		\App\Chaveamento::find($id)->update($request->all());
   		\Session::flash('flash_message',[
            'msg'=>"Tenista atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tenista.adicionar');        
   }
}
