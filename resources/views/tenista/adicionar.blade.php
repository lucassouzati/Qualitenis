@extends('layouts.app')

@section('content')	
<form action="{{route('tenista.salvar')}}" method="POST">
	{{csrf_field()}}
	<div>
		<label for="nome">Nome</label>
		<input type="text" name="nome">
	</div>
	<div>
		<label for="login">Login</label>
		<input type="text" name="login">
	</div>
	<div>
		<label for="senha">Senha</label>
		<input type="password" name="senha">
	</div>
	
	<div>
		<label for="email">E-mail</label>
		<input type="text" name="email">
	</div>
	<div>
		<label for="telefone">Telefone</label>
		<input type="text" name="telefone">
	</div>
	<div>
		<label for="Estado">Estado</label>
		<select name="estado">
			
		</select>

	</div>
	<div>
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
	</div>

</form>