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
                    <p><b>Torneio: </b>{{ $torneio->nome }}</p>
                    <p><b>Data: </b>{{ $torneio->data }}</p>
                    <p><b>Cidade: </b>{{ $torneio->cidade->nome }}</p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Chaveamento</th>
                                <th>Jogadores</th>                                
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>                           
                            @foreach($torneio->chaveamentos as $chaveamento)
                            <tr>
                                <th scope="row">{{ $telefone->id }}</th>
                                <td>{{ $telefone->titulo }}</td>
                                <td>{{ $telefone->telefone }}</td>                                
                                <td>
                                    <a class="btn btn-default" href="{{ route('telefone.editar',$telefone->id) }}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('telefone.deletar',$telefone->id) }}' : false)">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <p>
                        <a class="btn btn-info" href="{{route('telefone.adicionar',$torneio->id)}}">Adicinar Telefone</a>
                    </p>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection