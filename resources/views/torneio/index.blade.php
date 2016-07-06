@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">                    
                    <li class="active">Torneios</li>
                </ol>

                <div class="panel-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('torneio.adicionar') }}">Adicinar</a>
                    </p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Endereço</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($torneios as $torneio)

                            <tr>
                                <th scope="row">{{ $torneio->id }}</th>
                                <td>{{ $torneio->nome }}</td>
                                <td>{{ $torneio->email }}</td>
                                <td>{{ $torneio->endereco }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('torneio.detalhe',$torneio->id)}}">Detalhe</a>
                                    <a class="btn btn-default" href="{{route('torneio.editar',$torneio->id)}}">Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('torneio.deletar',$torneio->id)}}' : false)">Deletar</a>
                                </td>
                            </tr>                            

                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $torneios->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection