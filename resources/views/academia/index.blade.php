@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                
                    <a class="btn btn-default" href="{{route('Academia.adicionar')}}">Adicionar</a>
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
                                   <a class="btn btn-default" href="{{route('Academia.editar',$academia->id)}}">Editar</a>
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
</div>
@endsection
