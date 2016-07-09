@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('torneio.index') }}">Torneios</a></li>
                    <li class="active">Detalhe</li>
                </ol>

                <div class="panel-body">
                    <form action="{{route('chaveamento.editar' , $chaveamento->id)}}">
                    <div class="form-group">
                        <label for="classe">{{$chaveamento->classe->nome}}</label>
                    </div>    
                    <div class="form-group">
                        <label for="numerodejogadores">Número de jogadores</label>
                    </div>
                        <input type="number" name="numerodejogadores" class="form-control" placeholder="Número de jogaododres">
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection