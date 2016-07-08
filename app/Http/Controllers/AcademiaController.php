<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AcademiaController extends Controller
{	
	protected $fillable = ['nome','CNPJ','numQuadras'];
	public function adicionar()
	{	

		return view('academia.adicionar');
	}

	public function index()
    {
       $academias = \App\Academia::paginate(15);

       return view('academia.index',compact('academias'));
    }


	public function salvar(Request $request)
	{	
		$academia = new \App\Academia;
		$academia->nome = $request->input('nome');
		$cidade = \App\Cidade::find($request->input('cidade_id'));
		$academia->cidade()->associate($cidade);
		$academia->CNPJ = $request->input('CNPJ');
		$academia->numQuadras = $request->input('numQuadras');

		$academia->save();

		\Session::flash('flash_message',[
			'msg'=>"Academia adicionada com Sucesso!",
			'class'=>"alert-success"
			]);
		return redirect()->route('Academia.adicionar');
	}

	 public function editar($id)
    {
        $academia = \App\Academia::find($id);
        if(!$academia){
            \Session::flash('flash_message',[
                'msg'=>"Não existe essa academia cadastrada!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('Academia.adicionar');
        }

        return view('Academia.editar',compact('academia'));
    }

     public function atualizar(Request $request, $id)
    {
        \App\Academia::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Academia atualizada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('Academia.adicionar');        
        
    }

	
}
