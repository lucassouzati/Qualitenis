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
                    
                    <div class="form-group">
                        <label for="classe">{{$chaveamento->classe->nome}}</label>
                    </div>    
                    <div class="form-group">
                        <label for="numerodejogadores">Número de jogadores</label>
                    
                        <input type="number" name="numerodejogadores" class="form-control" placeholder="Número de jogadores">
                        </div>
                    <div>
                        <br>
                        <button class="btn btn-info">Atualizar</button>
                    </div>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection