@extends('layouts.app')

@section('content')
<div class="container">
    @can('partida_index')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                
                
                <div class="panel panel-default">
                    <ol class="breadcrumb panel-heading">                    
                        <li class="active">Partidas</li>
                    </ol>

                    <div class="panel-body">
                        <p>
                            <a class="btn btn-info" href="{{ route('partida.adicionar') }}">Adicionar</a>
                        </p>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Status</th>
                                    <th>Jogador 1</th>
                                    <th>Jogador 2</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($partidas as $partida)
                                                            <tr>
                                    <td scope="row">{{ $partida->id }}</td  >
                                    <td>{{date_format(date_create_from_format('Y-m-d',  $partida->data), 'd/m/Y')}}</td>
                                    <td>{{ $partida->status }}</td>
                                    <td>{{ $partida->jogador1->nome }}</td>
                                    <td>{{ $partida->jogador2->nome }}</td>
                                    
                                    <td>
                                        <a class="btn btn-default" href="{{route('partida.detalhe', ['torneio' => $torneio->id, 'chaveamento' => $chaveamento->id, 'id' => $partida->id])}}">Detalhe</a>
                                        
                                        @endif
                                    </td>
                                </tr>                            

                                @endforeach
                                
                            </tbody>
                            
                        </table>

                        <div align="center">
                            {!! $partidas->links() !!}
                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                                    
                    </div>            
                </div>        
            </div>
        </div>
    </div>
    @endcan
</div>

@endsection