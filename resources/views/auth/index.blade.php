@extends('layouts.app')

@section('content')
<div class="container">
    @can('Funcionario_index')
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
                                        ?>
                                    <a href="{{ route('Papel.permissoes',$papel->id) }}">{{ $papel->nome }}</a>
                                    <?php
                                         
                                    }
                                     
                                    ?></td>

                                <td>{{ $funcionario->cidade->nome }}</td>
                                <td>{{ $funcionario->academia->nome }}</td>
                                <td>{{ $funcionario->CPF }}</td>
                                <td>
                                @can('Funcionario_editar')
                                    <a class="btn btn-default" href="{{route('Auth.editar',$funcionario->id)}}">Editar</a>
                                @endcan
                                @can('Funcionario_desativar')
                                    <a class="btn btn-default" href="{{route('Auth.desativar',$funcionario->id)}}">Desativar</a>
                                @endcan
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
