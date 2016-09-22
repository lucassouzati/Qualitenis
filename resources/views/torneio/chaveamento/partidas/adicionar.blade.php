@extends('layouts.app')

@section('content')
<script src="{{asset('/plugins/jquery-bracket/dist/jquery.bracket.min.js')}}"></script>

 <link rel="stylesheet" href="{{asset('/plugins/jquery-bracket/dist/jquery.bracket.min.css')}}">
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

                                @forelse($partidas as $partida)
                                                            <tr>
                                    <td scope="row">{{ $partida->id }}</td  >
                                    <td>{{date_format(date_create_from_format('Y-m-d',  $partida->data), 'd/m/Y')}}</td>
                                    <td>{{ $partida->status }}</td>
                                    <td>{{ $partida->jogador1->nome }}</td>
                                    <td>{{ $partida->jogador2->nome }}</td>
                                    
                                    <td>
                                        <a class="btn btn-default" href="{{route('partidas.detalhe', ['torneio' => $torneio->id, 'chaveamento' => $chaveamento->id, 'id' => $partida->id])}}">Detalhe</a>
                                        
                                        
                                    </td>
                                </tr>                            
                                @empty
                                <tr>
                                    <td colspan="5" rowspan="" headers="">Sem partidas definidas.</td>
                                </tr>
                                @endforelse
                                
                            </tbody>
                            
                        </table>

                        

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
                    
                
                    <div id="minimal">
                      <h3>Minimal</h3>
                      <script type="text/javascript">
                      var minimalData = {
                          teams : [
                            ["Team 1", "Team 2"], /* first matchup */
                            ["Team 3", "Team 4"]  /* second matchup */
                          ],
                          results : [
                            [[1,2], [3,4]],       /* first round */
                            [[4,6], [2,1]]        /* second round */
                          ]
                        }

                      $(function() {
                          $('#minimal .demo').bracket({
                            init: minimalData /* data to initialize the bracket with */ })
                        })
                      </script>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Adicionar partida
                    </div>
                    <div class="panel-body">
                    <form action="{{route('partidas.store', ['torneio' => $torneio->id, 'chaveamento' => $chaveamento->id])}}" method="POST">
                        {{csrf_field()}}
                        
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label">Jogador 1:</label>
                                    <select name="jogador1_id" class="form-group">
                                        <option value="">Escolha um jogador</option>
                                        @forelse($inscricoes as $inscricao)
                                            <option value="{{$inscricao->id}}">{{$inscricao->tenista->nome}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if($errors->has('jogadores'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jogadores') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Jogador 1:</label>
                                    <select name="jogador2_id">
                                        <option value="">Escolha um jogador</option>
                                        @forelse($inscricoes as $inscricao)
                                            <option value="{{$inscricao->id}}">{{$inscricao->tenista->nome}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @if($errors->has('jogadores'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('jogadores') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-12">

                                <div class="col-md-10">
                                    <div class="form-group {{ $errors->has('data') ? 'has-error' : '' }}">
                                        <label class="control-label">Data:</label>
                                        <input type="text" name="data" value="" placeholder="">
                                        @if($errors->has('data'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('data') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                
                                    <div class="form-group {{ $errors->has('setjogador1') ? 'has-error' : '' }}">
                                        <label class="control-label">Set Jogador 1:</label>
                                        <input type="number" name="setjogador1" value="" placeholder="">
                                        @if($errors->has('setjogador1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('setjogador1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                
                                    <div class="form-group {{ $errors->has('setjogador2') ? 'has-error' : '' }}">
                                        <label class="control-label">Set Jogador 2:</label>
                                        <input type="number" name="setjogador2" value="" placeholder="">
                                        @if($errors->has('setjogador2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('setjogador2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                
                                    <div class="form-group">
                                        <label class="control-label">Status:</label>
                                        {!! Form::select('status', $enum, null, ['class' => '']) !!}
                                    </div>
                                

                                <div class="row">
                                <div class="col-md-offset-6">
                                    <input type="submit" name="" value="Salvar Partida" class="btn btn-primary">
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>            
                </div>        
            </div>
        </div>
    </div>
    @endcan
</div>



<script type="text/javascript">
$(function() {
    var big = $('#big div.demo')
    big.scrollLeft(big.width())

    $('pre.html').addClass('brush: html;')
    $('pre.js').addClass('brush: js;')
    SyntaxHighlighter.defaults['gutter'] = false
    SyntaxHighlighter.defaults['auto-links'] = false
    SyntaxHighlighter.all('code')
  })
</script>
@endsection