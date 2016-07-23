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


	public function salvar(\App\Http\Requests\AcademiaRequest $request)
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
		return redirect()->route('Academia.index');
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
       $this->validate($request, [
            
            'nome' => 'required',         
            'cidade_id' => 'required',
            'CNPJ' => 'required',
            'numQuadras' => 'required'
            
        ]);
        

       

        $academia = \App\Academia::find($id);
        $academia->nome = $request->input('nome');
        $cidade = \App\Cidade::find($request->input('cidade_id'));
        $academia->cidade()->associate($cidade);
        
        $academia->CNPJ = $request->input('CNPJ');
        $academia->numQuadras = $request->input('numQuadras');


               
        
        
        
        

        //\App\Cliente::find($id)->addTenista($academia);
        $academia->update();
        

        \Session::flash('flash_message',[
            'msg'=>"Academia atualizada com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('Academia.index');        
        
    }

     public function sendEmail()
    {
        $user = \App\User::find(1);
        $data = array(
        'name' => $user->name,
        'token' => $user->token,
        'user' => $user
        );
        \Mail::send('auth\emails.password', $data, function ($m) {
            $m->from('othogar@gmail.com', 'Your Application');

            $m->to('othogar@gmail.com')->subject('Your Reminder!');


        });

        return redirect()->route('Academia.adicionar');
    }
    
	
}
