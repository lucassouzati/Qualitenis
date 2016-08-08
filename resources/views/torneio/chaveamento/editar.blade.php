@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('torneio.index', $chaveamento->torneio->id)}}">Torneios</a></li>
                    <li class="active">Chaveamentos</li>
                </ol>

                <div class="panel-body">
                    <form action="{{route('chaveamento.atualizar' , ['torneio' => $torneio->id, 'chaveamento' => $chaveamento->id])}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="classe_id" class="form-control" value="{{$chaveamento->classe->id}}">
                    <div class="form-group">
                        <label for="classe">{{$chaveamento->classe->nome}}</label>
                    </div>    
                    <div class="form-group col-md-12 {{ $errors->has('numerodejogadores') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label" for="numerodejogadores">Número de jogadores</label>
                        <div class="col-md-2">                    
                        <input type="number" name="numerodejogadores" min="0" class="form-control" value="{{$chaveamento->numerodejogadores}}">
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
                                <input id="minutosestimadosdepartida" min="0" type="number" class="form-control" name="minutosestimadosdepartida" value="{{$chaveamento->minutosestimadosdepartida}}">

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
                                <input id="qtdset" type="number" min="0" class="form-control" name="qtdset" value="{{$chaveamento->qtdset}}">

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
                                <input id="qtdgameporset" min="0" type="number" class="form-control" name="qtdgameporset" value="{{$chaveamento->qtdgameporset}}">

                                @if ($errors->has('qtdgameporset'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('qtdgameporset') }}</strong>
                                </span>
                                @endif
                            </div>
                    </div>
                        <br>
                        <button class="btn btn-info">Atualizar</button>
                    
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection