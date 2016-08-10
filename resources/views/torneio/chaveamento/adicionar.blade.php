@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row form-horizontal">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('torneio.index', $torneio->id)}}">Torneios</a></li>
                    <li class="active">Chaveamentos</li>
                </ol>

                <div class="panel-body">
                    <form action="{{route('chaveamento.salvar' , $torneio->id)}}" method="post">
                    {{csrf_field()}}
                    
                    <div class="control-label col-md-offset-1 col-md-1">
                        <label for="classe">Classe</label>
                    </div>
                    <div class="form-group col-md-10 " >    
                        <?php 
                        $classes = \App\Classe::lists('nome', 'id');
                        //$classes = \App\Classe::all();
                        $classestorneio = $torneio->chaveamentos;
                        $classes2[] = null;
                        /*
                        foreach ($classes as $classe) {
                            # code...
                        
                            $achou = 0;
                            foreach ($classestorneio as $chaveamento) {
                                # code...

                                if($chaveamento->id == $classe->id){
                                    $achou = 1;
                                }
                            }
                            if($achou == 0 ){
                                //$classes2 = array_push($classe);
                                    //$classes2 = array_add($classes2, 'nome', $classe->nome, 'id',  $classe->id);
                                    $classes2 = array_pluck($classes, $classe->nome, $classe->id);
                            }

                        }
                        */
                        ?>
                        {{Form::select('classe_id', $classes, null)}}
                    </div>    
                    <div class="control-label col-md-2">
                        <label for="numerodejogadores">Número de jogadores</label>
                    </div>
                    <div class="form-group col-md-3 " >   
                        <input type="number" name="numerodejogadores" class="form-control" placeholder="Número de jogadores">
                    </div>
                    <div class="form-group col-md-12 " >                           <br>

                        <input type="hidden" name="torneio_id" value="{{$torneio->id}}">
                        <button class="btn btn-info">Adicionar</button>
                    </div>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection