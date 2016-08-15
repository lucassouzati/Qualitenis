@extends('layouts.app')

@section('content')
<div class="container">
    @can('Academia_index')
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    @can('Academia_adicionar')
                        <a class="btn btn-default" href="{{route('Academia.adicionar')}}">Adicionar</a>
                    @endcan
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cidade</th>
                                <th>CNPJ</th>
                                <th>Quadras</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($academias as $academia)
                               <tr>
                                <th scope="row">{{ $academia->id }}</th>
                                <td>{{ $academia->nome }}</td>
                                <td>{{ $academia->cidade->nome }}</td>
                                <td>{{ $academia->CNPJ }}</td>
                                <td>{{ $academia->numQuadras }}</td>
                                <td>
                                @can('Academia_editar')  
                                   <a class="btn btn-default" href="{{route('Academia.editar',$academia->id)}}">Editar</a>
                                @endcan
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $academias->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
