@extends('layouts.app')

@section('content')
<div class="container">
    @can('Permissao_adicionar')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Permissoes - {{ $nome }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="{{ route('Papel.addPermissao', $papel_id ) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <select class="selectpicker" data-style=".btn-primary .btn-select-light Select an Item" name="permissao_id">
                        <?php 
                           
                            foreach ($todas as $permissao) {
                                echo ('<option value="'.$permissao->id.'">'.$permissao->nome.'</option>');
                            }   
                        ?>      
                        </select>
                        <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Adicionar
                                </button>

                        <table class="table table-bordered">
                            <thead>
                                <tr>                                    
                                    <th>ID</th>
                                    <th>Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissoes as $permissao)                           
                                 <tr>
                                    <th scope="row">{{ $permissao->id }}</th>
                                    <td>{{ $permissao->nome }}</td>
                                </tr>                    
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
