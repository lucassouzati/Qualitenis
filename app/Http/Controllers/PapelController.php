<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PapelController extends Controller
{
    
     public function permissoes($id)
    {
        $papel = \App\Papel::orderBy('nome', 'asc')->find($id);
        $papel_id = $id;
        $permissoes  = $papel->permissaos;
        $nome = $papel->nome;
        $todas = \App\Permissao::orderBy('nome', 'asc')->get()->diff($permissoes);

        if(!$papel){
            \Session::flash('flash_message',[
                'msg'=>"Não existe esse papel cadastrado!",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('Academia.adicionar');
        }

        return view('papel.permissoes',compact('permissoes','nome','todas','papel_id'));
    }

    public function addPermissao(Request $request, $papel_id){
        $papel = \App\Papel::find($papel_id);
        $papel->permissaos()->attach($request->input("permissao_id"));
        return $this->permissoes($papel_id);
    }
}

