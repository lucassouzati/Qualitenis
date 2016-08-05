

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{route('tenista.lista')}}">Tenista</a></li>
                    <li class="active">Detalhe de {{$tenista->nome}}</li>
                </ol>

                <div class="panel-body">
                
                   <p><b>Nome: {{ $tenista->nome }}</b></p>
                   <p><b>Data: {{date_format(date_create_from_format('Y-m-d',  $tenista->datadenascimento), 'd/m/Y')}}</b></p>
                   <p><b>Cidade: {{$tenista->cidade->nome}}</b></p>
                   <p><b>Academia: {{$tenista->academia->nome}}</b></p>
                   <p><b>Status: {{ $tenista->statustenista->nome }}</b></p>
                   <p><b>E-mail: {{$tenista->email }}</b></p>
                   <p><b>Telefone: {{$tenista->telefone }}</b></p>
                   <form action="{{route('tenista.trocaclasse', $tenista->id)}}" method="POST" accept-charset="utf-8">
                   {{csrf_field()}}
                   <input type="hidden" name="_method" value="put" placeholder="">
                   <p><b>Classe: 
                    {{Form::select('classe_id', ['1' => 'Classe A', '2' => 'Classe B', '3' => 'Classe C', '4' => 'Feminino'], $tenista->classe->id)}}
                    <input type="submit" class="btn btn-info btn-default" name="" value="Trocar Classe" placeholder="">
                    </form>
                   </b></p>
                    

                    
                   
                        
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection