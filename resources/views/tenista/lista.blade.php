@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">                    
                    <li class="active">Tenistas</li>
                </ol>

                <div class="panel-body">
                    
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($tenistas as $tenista)
                                                        <tr>
                                <td scope="row">{{ $tenista->id }}</td  >
                                <td>{{ $tenista->nome }}</td>
                                <td>{{ $tenista->statustenista->nome }}</td>
                                <td>
                                    <a class="btn btn-default" href="{{route('tenista.detalhe', $tenista->id)}}">Detalhe</a>
                                    <form action="{{route('tenista.trocastatusporadmin', $tenista->id)}}" method="POST" class="btn">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        @if ($tenista->statustenista->id == 2)
                                        
                                        <input type="hidden" name="statustenista_id" value="1">
                                        
                                        <input type="submit" class="btn btn-info" value="Ativar" name="">
                                        @else
                                        <input type="hidden" name="statustenista_id" value="2">
                                        <input type="submit" class="btn btn-info" value="Desativar" name="">
                                        @endif
                                        
                                    </form>
                                    
                                </td>
                            </tr>                            

                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $tenistas->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection