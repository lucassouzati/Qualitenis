<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

class TorneioController extends Controller
{
    //

       public function adicionar()
    {	


    	return view('torneio.adicionar');
    }



    public function atualizar(Request $request, $id)
    {
        \App\Torneio::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Torneio atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.adicionar');        
        
    }

     public function salvar(Input $request){
        //\App\Torneio::create($request->all());

        $torneio = new \App\Torneio;

        //print_r(array_keys($request->get('cidade_id')));
        $cidade = \App\Cidade::find($request->get('cidade_id'));
        $torneio->cidade()->associate($cidade);
        $torneio->data = $request->get('data');
        $torneio->precodainscricao = $request->get('precodainscricao');
        $torneio->informacoes = $request->get('informacoes');
        $torneio->data = $request->get('data');
        $classes = $request->get('classes');
        //echo $torneio->data . " ";
        //echo $request->get('classes');
        //echo count($classes);
        //print_r(array_keys($classes));
        //$classes2= implode("," , $classes);
        //echo $classes2[0];
        $torneio->numerodechaveamentos=count($classes);

        $torneio->save();

        \Session::flash('flash_message',[
            'msg'=>"Torneio criado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.detalhe', compact('torneio'));
    }

}
