@extends('layouts.app')

@section('content')
<div class="container">
  @can('Academia')
  <div class="row">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-body">

          <form action="{{ route('Academia.salvar') }}" method="post">
            {{ csrf_field() }}
            {{-- NOME --}}
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" placeholder="Nome da Academia">
              @if($errors->has('nome'))
              <span class="help-block">
                <strong>{{ $errors->first('nome') }}</strong>
              </span>
              @endif
            </div>
            {{-- Cidade --}}
            <div class="form-group col-md-12 {{ $errors->has('cidade') ? 'has-error' : '' }}">
              <label for="Cidade">Cidade</label>
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
              <label for="CNPJ">CNPJ</label>
              <input type="text" name="CNPJ" class="form-control" placeholder="CNPJ da Academia">
              @if($errors->has('CNPJ'))
              <span class="help-block">
                <strong>{{ $errors->first('CNPJ') }}</strong>
              </span>
              @endif
            </div>
            {{-- Numero Quadras --}}
            <div>
              <label for="numQuadras">Numero de Quadras</label>
              <input type="text" name="numQuadras" class="form-control" placeholder="Quantidade de Quadras">
              @if($errors->has('numQuadras'))
              <span class="help-block">
                <strong>{{ $errors->first('numQuadras') }}</strong>
              </span>
              @endif
            </div>
            {{-- Botao Adicionar --}}
            <div>
              <br>
              <button class="btn btn-info">Adicionar</button>
            </div>


          </form>


        </div>
      </div>
    </div>
  </div>
  @endcan
</div>
@endsection