<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TorneioController extends Controller
{

    public function index()
    {   
        
        return view('torneio.index');
    }

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

     public function salvar(Request $request){
        \App\Torneio::create($request->all());

        \Session::flash('flash_message',[
            'msg'=>"Torneio criado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.adicionar');
    }

}
