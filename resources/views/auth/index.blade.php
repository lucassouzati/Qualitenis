@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-body">
                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Cidade</th>
                                <th>CPF</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($funcionarios as $funcionario)
                               <tr>
                                <th scope="row">{{ $funcionario->id }}</th>
                                <td>{{ $funcionario->name }}</td>
                                <td>{{ $funcionario->email }}</td>
                                <td>{{ $funcionario->cidade->nome }}</td>
                                <td>{{ $funcionario->CPF }}</td>
                                <td>
                                   
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $funcionarios->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
