@extends('layouts.app')

@section('content')
<div class="container">
    @can('Func')
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
                                <th>Funções</th>
                                <th>Cidade</th>
                                <th>Academia</th>
                                <th>CPF</th>
                                <th>Ações</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($funcionarios as $funcionario)
                           
                            @if($funcionario->ativo == true)
                             <tr>
                                <th scope="row">{{ $funcionario->id }}</th>
                                <td>{{ $funcionario->name }}</td>
                                <td>{{ $funcionario->email }}</td>

                                <td>
                                    <?php
                                    foreach ($funcionario->papels as $papel) {
                                        echo $papel->nome;
                                     }
                                     
                                    ?></td>

                                <td>{{ $funcionario->cidade->nome }}</td>
                                <td>{{ $funcionario->academia->nome }}</td>
                                <td>{{ $funcionario->CPF }}</td>
                                <td>
                                 <a class="btn btn-default" href="{{route('Auth.editar',$funcionario->id)}}">Editar</a>
                                 <a class="btn btn-default" href="{{route('Auth.desativar',$funcionario->id)}}">Desativar</a>
                             </td>
                         </tr>
                     @endif
                     
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
@endcan
</div>
@endsection
