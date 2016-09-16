@extends('layouts.app')

@section('content')
<div class="container">

    @can('Torneio_editar')
    <div class="row  form-horizontal">

        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ route('torneio.index') }}">Torneios</a></li>
                    <li class="active">Detalhe</li>
                </ol>

                <div class="panel-body">
                <p><b>Torneio: </b></p>
                @if($torneio->statustorneio->id == 1 || $torneio->statustorneio->id == 2)
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
                @endif
                @if($torneio->statustorneio->id == 2)
                <form action="{{route('torneio.trocastatus', $torneio->id)}}" method="POST" class="btn">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        
                                        <input type="hidden" name="statustorneio_id" value="4">
                                        <input type="submit" class="btn btn-success" value="Concluir Torneio" name="">
                </form>

                @endif
                @if($torneio->statustorneio->id <> 4)
                <form action="{{route('torneio.trocastatus', $torneio->id)}}" method="POST" class="btn" onsubmit="return confirm('Deseja realmente cancelar este torneio? Ele não poderá ser ativo novamente.');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="put" placeholder="">
                                        
                                        <input type="hidden" name="statustorneio_id" value="3">
                                        <input type="submit" class="btn btn-danger" value="Cancelar Torneio" name="">
                </form>

                @endif
                
                <a href="{{route('inscricao.index', ['torneio' => $torneio->id, 'id' => ''])}}" title="" class="btn btn-info">Gerenciar Inscrições</a>
                                        
                @if($torneio->statustorneio->id == 1)
                <form action="{{route('torneio.atualizar', $torneio->id)}}" method="POST">
                    {{csrf_field()}}
                           <input type="hidden" name="_method" value="put" placeholder="">
                    
                    <div class="row">
                        <div class="control-label col-md-offset-1 col-md-1">
                            <b>Estado</b>
                        </div>
                        <div class="form-group col-md-10 " >    
                            <p>{{Form::select('estado_id', $estados, null, ['id' => 'estado_id'])}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-label col-md-2">
                            <b>Cidade: </b>
                        </div>
                        <div class="form-group col-md-10 " >  
                            <p><select name="cidade_id" id="cidade_id">
                                <option value="{{$torneio->cidade->id}}">{{$torneio->cidade->nome}}</option>}
                                
                            </select></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-label col-md-2">
                            <b>Data: </b>
                        </div>
                        <div class="form-group col-md-10 " >    
                            <p><input type="text" name="data" value="{{date_format(date_create_from_format('Y-m-d',  $torneio->data), 'd/m/Y')}}" id="datemask">
                            @if($errors->has('data'))
                            <span class="help-block">
                                <strong>{{ $errors->first('data') }}</strong>
                            </span>
                            @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-label col-md-2">
                            <b>Preço da inscrição (R$): </b>
                        </div>
                        <div class="form-group col-md-10 " >    
                            <p><input type="text" name="precodainscricao" value="{{ $torneio->precodainscricao }}" >
                                @if($errors->has('precodainscricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('precodainscricao') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="control-label col-md-2">
                            <b>Informações: </b>
                        </div>
                        <div class="form-group col-md-10 " >  
                            <p><textarea name="informacoes">{{$torneio->informacoes }}</textarea></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-label col-md-2">
                            <b>Status: </b>
                        </div>
                         <div class="form-group col-md-10 " >  
                            <p>{{ $torneio->statustorneio->nome }}</p>
                        </div>
                    </div>
                    <input type="hidden" name="statustorneio_id" value="{{$torneio->statustorneio->id}}">
                    <div class="row">                    
                        <div class="col-md-offset-1 col-md-11" >  
                            <button class="btn btn-info">Atualizar</button>
                            <a href="{{route('torneio.index')}}"><button class="btn btn-default">Cancelar</button></a>
                            @if($torneio->statustorneio->id == 1 || $torneio->statustorneio->id == 2)
                            
                                                   
                        </div>
                    </div>
                </form>

                            
                            @endif
                <br/>
                <div>
                @else
                   <p><b>Torneio: </b></p>
                   <p><b>Preço da inscrição: {{ $torneio->precodainscricao }}</b></p>
                   <p><b>Data: {{date_format(date_create_from_format('Y-m-d',  $torneio->data), 'd/m/Y')}}</b></p>
                   <p><b>Cidade: {{$torneio->cidade->nome}}</b></p>
                   <p><b>Status: {{ $torneio->statustorneio->nome }}</b></p>
                   <p><b>Informações: {{$torneio->informacoes }}</b></p>
                @endif
                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Chaveamento</th>
                                <th>Jogadores</th>                                
                                <th>Vagas</th>                                
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>                           
                            @foreach($torneio->chaveamentos as $chaveamento)
                            <tr>
                                <th scope="row">{{ $chaveamento->id }}</th>
                                <td>{{ $chaveamento->classe->nome }}</td>
                                <td>{{ $chaveamento->numerodejogadores }}</td>                                
                                <td>{{ $chaveamento->vagas }}</td>                                
                                <td>
                                    <a class="btn btn-default" href="{{ $torneio->statustorneio->id == 1 ? route('torneio.chaveamento.editar', ['torneio' => $torneio->id, 'chaveamento' => $chaveamento->id]) : '#' }}" 
                                    {{ $torneio->statustorneio->id == 1 ? '' : 'disabled="true"' }}>Editar</a>
                                    @if($torneio->statustorneio->id == 1)
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse chaveamento? Todas inscrições realizadas nele também serão excluídas') ? window.location.href='{{ route('chaveamento.deletar', ['torneio' => $torneio->id, 'chaveamento' => $chaveamento->id]) }}' : false)" {{ $torneio->statustorneio->id == 1 ? '' : 'disabled="true"' }}>Deletar</a>
                                    @else
                                    <a class="btn btn-danger" href="#" disabled="true">Deletar</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
                    <div class="row">
                        @if($torneio->statustorneio->id == 1)
                        <div class="col-md-offset-1 col-md-11">
                            <a class="btn btn-info" href="{{route('chaveamento.adicionar', $torneio->id)}}">Adicionar chaveamento</a>
                        </div>
                        @endif
                   </div>
                    

                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
{{Html::script('js/jquery.maskedinput.js')}}
{{Html::script('js/jquery.js')}}
<!-- bootstrap datepicker -->
<script src="{{asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('js/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script>
$(function () {
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    
});
  /* Load positions into postion <selec> */
  $( "#estado_id" ).change(function() 
  {
    $.getJSON("/estado/"+ $(this).val() +"/cidades", function(jsonData){
        select = '<select name="cidade_id" class="form-control" required id="cidade_id" >';
          $.each(jsonData, function(i,data)
          {
               select +='<option value="'+data.id+'">'+data.nome+'</option>';
           });
        select += '</select>';
        $("#cidade_id").html(select);
    });
  });
</script>
@endsection