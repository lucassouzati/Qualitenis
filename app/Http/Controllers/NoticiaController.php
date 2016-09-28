<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NoticiaController extends Controller
{

  public function exibir(){
     $noticias = \App\Noticia::paginate(15);

     return view('Noticias.exibir',compact('noticias'));
  }

  public function selecionar($id){
     $noticias = \App\Noticia::paginate(15);
     $noticia_escolhida = \App\Noticia::find($id);

     return view('Noticias.exibir',compact('noticias','noticia_escolhida'));
  }


  public function salvar(Request $request)
  {
    if($request->user()){
      $noticia = new \App\Noticia;
      $noticia->user()->associate($request->user());
      $noticia->titulo = $request->input('titulo');
      $noticia->descricao = $request->input('descricao');
      $noticia->palavras_chave = $request->input('palavras_chave');



      $noticia->save();

    }
    return redirect('/noticias');
  }

}
