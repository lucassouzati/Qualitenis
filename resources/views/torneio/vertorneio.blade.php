

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ url('/tenista') }}">Tenista {{auth()->guard('tenista')->user()->nome}}</a></li>
                    <li class="active">Torneios</li>
                </ol>

                <div class="panel-body">
                
                   <p><b>Torneio: </b></p>
                   <p><b>Preço da inscrição: {{ $torneio->precodainscricao }}</b></p>
                   <p><b>Data: {{date_format(date_create_from_format('Y-m-d',  $torneio->data), 'd/m/Y')}}</b></p>
                   <p><b>Cidade: {{$torneio->cidade->nome}}</b></p>
                   <p><b>Status: {{ $torneio->statustorneio->nome }}</b></p>
                   <p><b>Informações: {{$torneio->informacoes }}</b></p>
                    
                  @foreach($torneio->chaveamentos as $chaveamento)
                  <div class="col-md-8">
                    <div class="panel panel-default">
                      <ol class="breadcrumb panel-heading">
                          
                         <li class="active">Chaveamento {{$chaveamento->classe->nome}}</li>
                      </ol>

                      <div class="panel-body">   
                         <p><b>Número de Jogadores: {{ $chaveamento->numerodejogadores }}</b></p>
                         <p><b>Tempo Estimado de Partida: {{ $chaveamento->minutosestimadosdepartida }}</b></p>
                         <p><b>Quantidade de sets por jogo: {{ $chaveamento->qtdset }}</b></p>
                         <p><b>Quantidade de games por set: {{ $chaveamento->qtdgameporset }}</b></p>
                         <p><b>Dupla: 
                         @if($chaveamento->dupla){{ 'Sim' }}
                         @else {{'Não'}}
                         @endif</b></p>

                         <form action="{{route('inscricao.store', $torneio->id)}}" method="post" onsubmit="return checkForm(this);">
                          {{csrf_field()}}
                           <input type="hidden" name="tenista_id" value="{{auth()->guard('tenista')->user()->id}}">
                           <input type="hidden" name="chaveamento_id" value="{{$chaveamento->id}}">
                           <input type="hidden" name="torneio_id" value="{{$torneio->id}}">
                           <input type="hidden" name="" value="">
                           <p><input type="checkbox" name="terms"> Eu concordo com as <u>regras desse chaveamento</u>.</p>
                           <input type="submit" class="btn btn-info btn-default" value="Inscrever">
                         </form>
                      </div>
                    </div>
                  </div>
                  @endforeach    
            </div>
        </div>
    </div>
     
    </div>    
</div>
<script type="text/javascript">

  function checkForm(form)
  {

    if(!form.terms.checked) {
      alert("Você precisa concordar com as regras para poder se inscrever.");
      form.terms.focus();
      return false;
    }
    return true;
  }

</script>
@endsection