

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
                   <p><b>Classe: {{$tenista->classe->nome}}</b></p>
                    

                    
                   
                        
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection