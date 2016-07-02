@extends('layouts.app')

@section('content')	
<form action="{{ route('tenista.atualizar', $tenista->id) }}" method="POST">
	{{csrf_field()}}
	<input type="hidden" name="_method" value="put">
	<div>
		<label for="nome">Nome</label>
		<input type="text" name="nome" value="{{$tenista->nome}}">
	</div>
	<div>
		<label for="login">Login</label>
		<input type="text" name="login" value="{{$tenista->login}}">
	</div>
	<div>
		<label for="senha">Senha</label>
		<input type="password" name="senha" value="{{$tenista->senha}}">
	</div>
	
	<div>
		<label for="email">E-mail</label>
		<input type="text" name="email" value="{{$tenista->email}}">
	</div>
	<div>
		<label for="telefone">Telefone</label>
		<input type="text" name="telefone" value="{{$tenista->telefone}}">
	</div>
	<div>
		<label for="Estado">Estado</label>
		<select name="estado">
			
		</select>

	</div>
	<div>
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
	<div>
		<label for="DatadeNascimento">Data de Nascimento</label>
		<input type="text" name="datadenascimento" value="{{date_format(date_create_from_format('Y-m-d', $tenista->datadenascimento), 'd/m/Y')}}"></input>
			
	</div>
	<input type="hidden" name="statustenista_id" value=" value="{{$tenista->statustenista->id}}"">
	<button class="btn btn-info">Adicionar</button>
</form>