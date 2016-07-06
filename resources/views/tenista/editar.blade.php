@extends('layouts.app')

@section('content')	
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <h3 class="page-header">Dados do Tenista</h3>
				<form action="{{ route('tenista.atualizar', $tenista->id) }}" method="POST">
					{{csrf_field()}}
					<div class="row">
					<input type="hidden" name="_method" value="put">
	<div class="form-group col-md-12">
		<label for="nome">Nome</label>
		<input type="text" name="nome" value="{{$tenista->nome}}">
	</div>
	<div class="form-group col-md-12">
		<label for="login">Login</label>
		<input type="text" name="login" value="{{$tenista->login}}">
	</div>
	<div class="form-group col-md-12">
		<label for="senha">Senha</label>
		<input type="password" name="senha" value="{{$tenista->senha}}">
	</div>
	
	<div class="form-group col-md-12">
		<label for="email">E-mail</label>
		<input type="text" name="email" value="{{$tenista->email}}">
	</div>
	<div class="form-group col-md-12">
		<label for="telefone">Telefone</label>
		<input type="text" name="telefone" value="{{$tenista->telefone}}" id="phone">
	</div>
	<div class="form-group col-md-12">
		<label for="Estado">Estado</label>
		<select name="estado">
			
		</select>

	</div>
	<div class="form-group col-md-12">
		<label for="Cidade">Cidade</label>
		<select name="cidade_id">
		<option  value="{{$tenista->cidade->id}}">{{$tenista->cidade->nome}}</option>
		<?php 
			$estado = \App\Estado::find(19);
			$cidades = $estado->cidades; 
			foreach ($cidades as $cidade) {
				# code...
				echo ('<option value="'.$cidade->id.'">'.$cidade->nome.'</option>');
			}
			

		?>
		</select>
	</div>
	<div class="form-group col-md-12">
		<label for="DatadeNascimento">Data de Nascimento</label>
		<input type="date" name="datadenascimento" value="{{date_format(date_create_from_format('Y-m-d', $tenista->datadenascimento), 'd/m/Y')}}"></input>
			
	</div>
	<div class="form-group col-md-12">
		<input type="hidden" name="statustenista_id" value=" value="{{$tenista->statustenista->id}}"">
		<button class="btn btn-info">Salvar</button>
		<a href="#" class="btn btn-default">Cancelar</a>
	</div>
</form>

            </div>
        </div>
    </div>
</div>
<script src="script_jquery.js" type="text/javascript"></script>
@endsection