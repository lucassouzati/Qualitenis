@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-body">

          <form action="{{ route('Academia.salvar') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            {{-- NOME --}}
              <div class="control-label col-md-offset-1 col-md-1">
              <label for="nome">Nome</label>
              </div>
              <div class="form-group col-md-10">
              <input type="text" name="nome" class="form-control" placeholder="Nome da Academia">
              @if($errors->has('nome'))
              <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
              </span>
              @endif
            </div>
            {{-- Cidade --}}
            <div class="control-label col-md-offset-1 col-md-1 {{ $errors->has('cidade') ? 'has-error' : '' }}">
              <label for="Cidade">Cidade</label>
            </div>
            <div class="form-group col-md-10">
              <select name="cidade_id">
                <?php 
                $estado = \App\Estado::find(19);
                $cidades = $estado->cidades; 
                foreach ($cidades as $cidade) {
                # code...
                  echo ('<option value="'.$cidade->id.'">'.$cidade->nome.'</option>');
                } 
                ?>    
              </select>
              @if($errors->has('cidade'))
              <span class="help-block">
                <strong>{{ $errors->first('cidade') }}</strong>
              </span>
              @endif
            </div>
            {{-- CNPJ --}}
            <div>  
              <div class="control-label col-md-offset-1 col-md-1">          
              <label for="CNPJ">CNPJ</label>
              </div>
              <div class="form-group col-md-10">
              <input type="text" name="CNPJ" class="form-control" placeholder="CNPJ da Academia">
              @if($errors->has('CNPJ'))
              <span class="help-block">
                <strong>{{ $errors->first('CNPJ') }}</strong>
              </span>
              @endif
              </div>
            </div>
            {{-- Numero Quadras --}}
            <div>
              <div class="control-label col-md-2">
              <label for="numQuadras">Numero de Quadras</label>
              </div>
              <div class="form-group col-md-10">
              <input type="text" name="numQuadras" class="form-control" placeholder="Quantidade de Quadras">
              @if($errors->has('numQuadras'))
              <span class="help-block">
                <strong>{{ $errors->first('numQuadras') }}</strong>
              </span>
              @endif
              </div>
            </div>
            {{-- Botao Adicionar --}}
            <div class="row">
              <div class="col-md-offset-1 col-md-1">
              <button class="btn btn-info">Adicionar</button>
              </div>
              <div class="col-md-10">
                <a href="{{route('Academia.index')}}" class="btn btn-default">Cancelar</a>
              </div>
            </div>


          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection