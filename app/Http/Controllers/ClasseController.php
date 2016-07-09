<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClasseController extends Controller
{
    public function adicionar()
	{	

		return view('classe.adicionar');
	}

	public function index()
    {
       $classesupp = \App\Classe::paginate(15);

       return view('classe.index',compact('classes'));
    }


	public function salvar(Request $request)
	{	
		$classe = new \App\Classe;
		$classe->nome = $request->input('nome');
		
		$classe->save();

		\Session::flash('flash_message',[
			'msg'=>"Classe adicionada com Sucesso!",
			'class'=>"alert-success"
			]);
		return redirect()->route('Classe.adicionar');
	}

		 public function editar($id)
    {
        $classe = \App\Classe::find($id);
        if(!$classe){
            \Session::flash('flash_message',[
                'msg'=>"Não existe essa classe cadastrada!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('Classe.adicionar');
        }

        return view('Classe.editar',compact('classe'));
    }

     public function atualizar(Request $request, $id)
    {
        \App\Classe::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Classe atualizada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('Classe.adicionar');        
        
    }
}
