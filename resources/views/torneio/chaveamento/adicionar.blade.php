@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('torneio.index', $torneio->id)}}">Torneios</a></li>
                    <li class="active">Chaveamentos</li>
                </ol>

                <div class="panel-body">
                    <form action="{{route('chaveamento.salvar' , $torneio->id)}}" method="post">
                    {{csrf_field()}}
                    
                    <div class="form-group {{ $errors->has('classe_id') ? ' has-error' : '' }}">
                        <label for="classe">Classe</label>
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
                        @if ($errors->has('classe_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('classe_id') }}</strong>
                                </span>
                                @endif
                    </div>    
                    <div class="form-group col-md-12 {{ $errors->has('numerodejogadores') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label" for="numerodejogadores">Número de jogadores</label>
                        <div class="col-md-2">                    
                        <input type="number" name="numerodejogadores" min="0" class="form-control">
                        @if ($errors->has('numerodejogadores'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('numerodejogadores') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>
                    
                    <div class="form-group col-md-12 {{ $errors->has('minutosestimadosdepartida') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Tempo Estimado de Partida (Minutos)</label>

                            <div class="col-md-2">
                                <input id="minutosestimadosdepartida" min="0" type="number" class="form-control" name="minutosestimadosdepartida">

                                @if ($errors->has('minutosestimadosdepartida'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('minutosestimadosdepartida') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group col-md-12 {{ $errors->has('qtdset') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Quantidade de Sets</label>

                            <div class="col-md-2">
                                <input id="qtdset" type="number" min="0" class="form-control" name="qtdset">

                                @if ($errors->has('qtdset'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('qtdset') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group col-md-12 {{ $errors->has('qtdgameporset') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Quantidade de Games por set</label>

                            <div class="col-md-2">
                                <input id="qtdgameporset" min="0" type="number" class="form-control" name="qtdgameporset">

                                @if ($errors->has('qtdgameporset'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('qtdgameporset') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>
                        <br>
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