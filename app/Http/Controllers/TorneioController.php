<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

class TorneioController extends Controller
{

    public function index()
    {   
        $torneios = \App\Torneio::paginate(10);
        return view('torneio.index', compact('torneios'));
    }

    //

       public function adicionar()
    {	


    	return view('torneio.adicionar');
    }



    public function atualizar(Request $request, $id)
    {
        $this->validar($request);
        $torneio = \App\Torneio::find($id);
        //$torneio->update($request->all());
        $torneio->precodainscricao = $request->get('precodainscricao');
        $torneio->informacoes = $request->get('informacoes');
        $cidade = \App\Cidade::find($request->get('cidade_id'));
        $torneio->cidade()->associate($cidade);
        $torneio->statustorneio()->associate(\App\Statustorneio::find($request->input('statustorneio_id')));
        $torneio->update();
        \Session::flash('flash_message',[
            'msg'=>"Torneio atualizado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('torneio.detalhe', compact('torneio'));        
        
    }

     public function salvar(Request $request){
        //\App\Torneio::create($request->all());
        $this->validar($request);
        $torneio = new \App\Torneio;

        //print_r(array_keys($request->get('cidade_id')));
        $cidade = \App\Cidade::find($request->get('cidade_id'));
        $torneio->cidade()->associate($cidade);
        $torneio->data = $request->get('data');
        $torneio->precodainscricao = $request->get('precodainscricao');
        $torneio->informacoes = $request->get('informacoes');
        $date = date_create_from_format('j/m/Y', $request->input('data'));
        
        $torneio->data = date_format($date, 'Y-m-d');
        $torneio->statustorneio()->associate(\App\Statustorneio::find(1)); //Todo torneio começa como inativo
        $classes = $request->get('classes');
        //echo $torneio->data . " ";
        //echo $request->get('classes');
        //echo count($classes);
        //print_r(array_keys($classes));
        //$classes2= implode("," , $classes);
        //echo $classes2[0];
        $torneio->numerodechaveamentos=count($classes);

        $torneio->save();

        foreach ($classes as $key) {
            # code...
            $chaveamento = new \App\Chaveamento;

            $classe = \App\Classe::find($key);
            $chaveamento->torneio()->associate($torneio);
            $chaveamento->classe()->associate($classe);
            $chaveamento->numerodejogadores = 0;
            $chaveamento->minutosestimadosdepartida = 0;
            $chaveamento->qtdset = 0;
            $chaveamento->qtdgameporset = 0;
            //\App\Chaveamento::create(['numerodejogadores' => '0' , 'torneio_id' => $torneio->id, 'classe_id' => $classe->id]);
            $chaveamento->save();
        }

        

        \Session::flash('flash_message',[
            'msg'=>"Torneio criado com Sucesso!",
            'class'=>"alert-success"
        ]);
        return view('torneio.detalhe',compact('torneio'));
        //return redirect()->route('torneio.detalhe', compact('torneio'));
    }

    public function trocaStatus(Request $request, $id){
        $torneio = \App\Torneio::find($id);
        $torneio->statustorneio()->associate(\App\Statustorneio::find($request->input('statustorneio_id')));
        $torneio->update();
        return redirect()->route('torneio.detalhe', compact('torneio')); 
    }

    public function detalhe($id)
    {
        $torneio = \App\Torneio::find($id);
        return view('torneio.detalhe',compact('torneio'));

    }

    public function validar(Request $request){
         $this->validate($request, [
            'precodainscricao' => 'required',
            'data' => 'required|date_format:j/m/Y',
            'classes' => 'required',
            
        ]);
    }

    public function ver($id){   
        $torneio = \App\Torneio::find($id);

        //$inscricoes = $torneio->inscricoes()->where('tenista_id', \Auth::guard('tenista')->user()->id);
        $inscricao = \App\Inscricao::where('tenista_id', \Auth::guard('tenista')->user()->id)->where('torneio_id', $torneio->id)->where('status', '<>', 'Cancelada')->first();

        //dd($inscricoes);
        return view('torneio.vertorneio', compact('torneio'), compact('inscricao'));
    }

}
