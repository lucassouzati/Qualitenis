@extends('layouts.app')

@section('content')
<div class="container">
    @can('Torneio_index')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">                    
                    <li class="active">Torneios</li>
                </ol>

                <div class="panel-body">
                    <p>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Tenista</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($inscricoes as $inscricao)
                                                        <tr>
                                <td scope="row">{{ $inscricao->id }}</td  >
                                <td>{{$inscricao->created_at}}</td>
                                <td>{{ $inscricao->tenista->nome }}</td>
                                <td>{{ $inscricao->status }}</td>
                                <td>
                                    @if ($inscricao->status == 'Aguardando Pagamento')
                                    <form action="{{route('inscricao.trocastatus', $inscricao->id)}}" method="POST" class="btn">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        <input type="hidden" name="status" value="Confirmada">
                                        
                                        <input type="submit" class="btn btn-info" value="Aprovar" name="">
                                    </form>
                                    <form action="{{route('inscricao.trocastatus', $inscricao->id)}}" method="POST" class="btn">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        <input type="hidden" name="status" value="Cancelada">
                                        
                                        <input type="submit" class="btn btn-danger" value="Cancelar" name="">
                                    </form>
                                    @elseif ($inscricao->status == 'Aprovada')
                                    <form action="{{route('inscricao.trocastatus', $inscricao->id)}}" method="POST" class="btn" onsubmit="return confirm('');>
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        <input type="hidden" name="status" value="Cancelada">
                                        
                                        <input type="submit" class="btn btn-danger" value="Cancelar" name="">
                                    </form>
                                    @else

                                    @endif
                                </td>
                            </tr>                            

                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $inscricoes->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
{{Html::script('js/jquery.maskedinput.js')}}
{{Html::script('js/jquery.js')}}
@endsection