@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{ route('Classe.salvar') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" placeholder="Nome da Classe">
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