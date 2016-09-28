@extends('layouts.app')

@section('content')
<script src="{{asset('/plugins/jquery-bracket/dist/jquery.bracket.min.js')}}"></script>

 <link rel="stylesheet" href="{{asset('/plugins/jquery-bracket/dist/jquery.bracket.min.css')}}">
 <script type="text/javascript">
$(function() {
    var demos = ['save', 'minimal', 'matches', 'customHandlers', 'autoComplete', 'doubleElimination', 'noSecondaryFinal', 'noConsolationRound', 'noGrandFinalComeback', 'reverseBracket', 'big']
    $.each(demos, function(i, d){
      var demo = $('div#'+d)
      $('<div class="demo"></div>').appendTo(demo)
      //var pre = $('<pre name="code" class="js"></pre>').appendTo(demo)
      //var script = demo.find('script')
      //demo.find("h3").append($('<a href="#' + d + '">¶</a>'))
      //pre.text(script.html())
    })
  })
</script>
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

                                @forelse($partidasdefinidas as $partida)
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
                    
                
                    <div id="customHandlers">
                      <h3>Chaveamento</h3>
                      <script type="text/javascript">
                      var customData = {
                          teams : [
                            @foreach($partidas as $partida)
                            @if($partida->jogador1_id <> 0 )
                            [{name: "{{ $partida->jogador1->nome }}", id: {{$partida->id}} },
                            @else
                            [{name: " ", id: "{{$partida->id}}"}, 
                            @endif
                            @if($partida->jogador2_id <> 0 )
                            {name: "{{ $partida->jogador2->nome }}", id: {{$partida->id}} }], 
                            @else
                            {name: " ", id: "{{$partida->id}}"}],
                            @endif
                            
                          @endforeach  
                          ],
                          
                          results : [[
                            @foreach($partidas as $partida)
                            
                            [{{$partida->setjogador1}}, {{$partida->setjogador2}}, {{$partida->id}}], 
                            
                            @endforeach
                            ],
                          ]
                        }

                        function onclick(data) {
                          //$('#matchCallback').text("onclick(data: '" + data + "')")
                          $('#msgPartidaSelecionada').text("Partida " + data + " selecionada.")
                          $('#partida_id').val(data);
                          $('#formAtualizaPartida').attr('action', 'http://qualitenis.dev/torneio/1/chaveamento/1/partidas/'+data+'/update');

                          
                        }
                         
                        function onhover(data, hover) {
                         // $('#matchCallback').text("onhover(data: '" + data + "', hover: " + hover + ")")
                         //$('#partida_id').val(data);
                        }

                        /* Edit function is called when team label is clicked */
                            function edit_fn(container, data, doneCb) {
                                
                                $('#msgPartidaSelecionada').text("Partida " + data.id + " selecionada.");
                                $('#partida_id').val(data.id);
                                $('#formAtualizaPartida').attr('action', 'http://qualitenis.dev/torneio/1/chaveamento/1/partidas/'+data.id+'/update');

                                if(data.id != '')
                                {

                                    $.ajax({
                                        url: "{{ route('retornaPartidaAjax') }}",
                                        dataType: "json",
                                        data: {
                                            id : data.id
                                        },
                                        success: function(result) {
                                            //response(data);
                                            

                                            $('#partida_id').val(result[0].id);
                                            $('#data').val(result[0].data);
                                            $('#jogador1_id').val(result[0].jogador1_id);
                                            $('#jogador2_id').val(result[0].jogador2_id);
                                            $('#setjogador1').val(result[0].setjogador1);
                                            $('#setjogador2').val(result[0].setjogador2);
                                            $('#status').val(result[0].status);
                                            
                                        }
                                    });
                                }

                            
                        }

                        /* Render function is called for each team label when data is changed, data
                         * contains the data object given in init and belonging to this slot. */
                        function render_fn(container, data, score) {
                          if (!data.id || !data.name)
                            return
                          container.append(data.name)
                        }
                                              
                        $(function() {
                          $('div#customHandlers .demo').bracket({
                            init: customData /* data to initialize the bracket with */ ,
                            
                            save: function(){}, /* without save() labels are disabled */
                            decorator:  {edit: edit_fn,
                                        render: render_fn}
                                    })
                        
                            

                        })   
                      </script>
                      
                    </div>
                </div>
            </div>
            
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div id="msgPartidaSelecionada" class="panel-heading">
                        Selecione uma partida acima
                    </div>
                    <div class="panel-body">
                    <form id="formAtualizaPartida" action="#" method="POST">
                        {{csrf_field()}}
                    <input type="hidden" name="partida_id" id="partida_id" value="">            
                    <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <label class="control-label">Jogador 1:</label>
                                    <select name="jogador1_id" id="jogador1_id" class="form-group">
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
                                    <select name="jogador2_id" id="jogador2_id">
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
                                        <input type="text" name="data" id="data" value="" placeholder="">
                                        @if($errors->has('data'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('data') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                
                                    <div class="form-group {{ $errors->has('setjogador1') ? 'has-error' : '' }}">
                                        <label class="control-label">Set Jogador 1:</label>
                                        <input type="number" name="setjogador1" id="setjogador1" value="" placeholder="">
                                        @if($errors->has('setjogador1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('setjogador1') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                
                                    <div class="form-group {{ $errors->has('setjogador2') ? 'has-error' : '' }}">
                                        <label class="control-label">Set Jogador 2:</label>
                                        <input type="number" name="setjogador2" id="setjogador2" value="" placeholder="">
                                        @if($errors->has('setjogador2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('setjogador2') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                
                                    <div class="form-group">
                                        <label class="control-label">Status:</label>
                                        {!! Form::select('status', $enum, null, ['class' => '' , 'id' => 'status']) !!}
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

@endsection