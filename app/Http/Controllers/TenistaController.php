<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TenistaController extends Controller
{
    //
    public function index()
    {   
        
        return view('tenista.index');
    }


    
    //
    public function adicionar()
    {	
    	
    	return view('tenista.adicionar');
    }




    public function atualizar(Request $request, $id)
    {
        \App\Tenista::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Tenista atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tenista.adicionar');        
        
    }

        public function salvar(Request $request)
    {   
        $this->validate($request, [
            
            'nome' => 'required',
            'login' => 'required|unique:tenistas',
            'senha' => 'required|min:8|max:16',
            'datadenascimento' => 'required|date_format:j/m/Y',
            'email' => 'required|email|unique:tenistas',
            'telefone' => 'required|numeric',
            'cidade_id' => 'required',
            'sexo' => 'required'
            
        ]);

        $tenista = new \App\Tenista;
        $tenista->nome = $request->input('nome');
        $tenista->login = $request->input('login');
        $tenista->senha = $request->input('senha');
        $tenista->email = $request->input('email');
        $tenista->telefone = $request->input('telefone');
        $cidade = \App\Cidade::find($request->input('cidade_id'));
        $tenista->cidade()->associate($cidade);
        $date = date_create_from_format('j/m/Y', $request->input('datadenascimento'));
        $tenista->datadenascimento = date_format($date, 'Y-m-d');
        $tenista->sexo = $request->input('sexo');
        $statustenista = \App\Statustenista::find($request->input('statustenista_id'));
        $tenista->statustenista()->associate($statustenista);

        //\App\Cliente::find($id)->addTenista($tenista);
        $tenista->save();

        \Session::flash('flash_message',[
            'msg'=>"Tenista adicionado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tenista.adicionar');
        
    }

       public function editar($id)
    {
        $tenista = \App\Tenista::find($id);
        if(!$tenista){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse tenista cadastrado! Deseja cadastrar um novo tenista?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('tenista.adicionar');
        }

        return view('tenista.editar',compact('tenista'));
    }

    public function deletar($id)
    {
        $tenista = \App\Tenista::find($id);

        $tenista->delete();

        \Session::flash('flash_message',[
            'msg'=>"Tenista deletado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tenista.adicionar'); 
    }
}




