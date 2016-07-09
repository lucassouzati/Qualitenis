@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{ route('Academia.salvar') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" placeholder="Nome do Cliente">
            </div>
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
            <div>
              <label for="CNPJ">CNPJ</label>
              <input type="text" name="CNPJ" class="form-control" placeholder="CNPJ da Academia">
            </div>
            <div>
              <label for="numQuadras">Numero de Quadras</label>
              <input type="text" name="numQuadras" class="form-control" placeholder="Quantidade de Quadras">
            </div>
            <div>
              <br>
              <button class="btn btn-info">Adicionar</button>
            </div>


          </form>


        </div>
      </div>
    </div>
  </div>
</div>
@endsection