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
	<div class="{{ $errors->has('nome') ? 'has-error' : '' }} form-group col-md-12">
		<label for="nome">Nome</label>
		<input type="text" name="nome" value="{{$tenista->nome}}">
		@if($errors->has('nome'))
	        <span class="help-block">
	            <strong>{{ $errors->first('nome') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="{{ $errors->has('login') ? 'has-error' : '' }} form-group col-md-12">
		<label for="login">Login</label>
		<input type="text" name="login" value="{{$tenista->login}}">
		@if($errors->has('login'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
	</div>
	<div class="{{ $errors->has('senha') ? 'has-error' : '' }} form-group col-md-12">
		<label for="senha">Senha</label>
		<input type="password" name="senha" value="{{$tenista->senha}}">
		@if($errors->has('senha'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('senha') }}</strong>
                                </span>
                            @endif
	</div>
	<div class="form-group col-md-6 {{ $errors->has('sexo') ? 'has-error' : '' }}">
		<input type="radio" name="sexo" value="M">Masculino<br>
			<input type="radio" name="sexo" value="F">Feminino<br>
			@if($errors->has('sexo'))
                <span class="help-block">
                    <strong>{{ $errors->first('sexo') }}</strong>
                </span>
            @endif
	</div>
	<div class="{{ $errors->has('email') ? 'has-error' : '' }} form-group col-md-12">
		<label for="email">E-mail</label>
		<input type="text" name="email" value="{{$tenista->email}}">
		@if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
	</div>
	<div class="{{ $errors->has('telefone') ? 'has-error' : '' }} form-group col-md-12">
		<label for="telefone">Telefone</label>
		<input type="text" name="telefone" value="{{$tenista->telefone}}" id="phone">
		@if($errors->has('telefone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                            @endif
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
	<div class="{{ $errors->has('datadenascimento') ? 'has-error' : '' }} form-group col-md-12">
		<label for="DatadeNascimento">Data de Nascimento</label>
		<input type="date" name="datadenascimento" value="{{date_format(date_create_from_format('Y-m-d', $tenista->datadenascimento), 'd/m/Y')}}"></input>
		@if($errors->has('datadenascimento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('datadenascimento') }}</strong>
                                </span>
                            @endif
			
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