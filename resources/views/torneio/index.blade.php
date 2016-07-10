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
                        <a class="btn btn-info" href="{{ route('torneio.adicionar') }}">Adicionar</a>
                    </p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Cidade</th>
                                <th>Número de chaveamentos</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($torneios as $torneio)
                                                        <tr>
                                <td scope="row">{{ $torneio->id }}</td  >
                                <td>{{date_format(date_create_from_format('Y-m-d',  $torneio->data), 'd/m/Y')}}</td>
                                <td>{{ $torneio->statustorneio->nome }}</td>
                                <td>{{ $torneio->cidade->nome }}</td>
                                <td>{{ $torneio->numerodechaveamentos }}</td>
                                
                                <td>
                                    <a class="btn btn-default" href="{{route('torneio.detalhe', $torneio->id)}}">Detalhe</a>
                                    <form action="{{route('torneio.trocastatus', $torneio->id)}}" method="POST" class="btn">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        @if ($torneio->statustorneio->id == 1)
                                        
                                        <input type="hidden" name="statustorneio_id" value="2">
                                        
                                        <input type="submit" class="btn btn-info" value="Ativar" name="">
                                        @else
                                        <input type="hidden" name="statustorneio_id" value="1">
                                        <input type="submit" class="btn btn-info" value="Desativar" name="">
                                        @endif
                                        
                                    </form>
                                    
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