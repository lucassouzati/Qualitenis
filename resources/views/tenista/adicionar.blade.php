@extends('layouts.app')

@section('content')	
<!-- <script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
<script>
	jQuery(function($){
   $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
   $("#phone").mask("(999) 999-9999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});
</script> -->
<div class="container">
	
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <h3 class="page-header">Novo Tenista</h3>
				<form action="{{ route('tenista.salvar') }}" method="POST">
				
						{{csrf_field()}}
				<div class="row">
					<div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
						<label for="nome">Nome</label>
						<input type="text" name="nome" value="{{old('nome')}}">
						@if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
					</div>
					<div class="form-group col-md-6 {{ $errors->has('login') ? 'has-error' : '' }}">
						<label for="login">Login</label>
						<input type="text" name="login">
						@if($errors->has('login'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
					</div>
					<div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
						<label for="password">Senha</label>
						<input type="password" name="password">
						@if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
					</div>
					<div class="form-group col-md-12 {{ $errors->has('datadenascimento') ? 'has-error' : '' }}">
						<label for="DatadeNascimento">Data de Nascimento</label>
						<input type="text" name="datadenascimento" id="date"/>
						@if($errors->has('datadenascimento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('datadenascimento') }}</strong>
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
					<div class="form-group col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
						<label for="email">E-mail</label>
						<input type="text" name="email">
						@if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
					</div>
					<div class="form-group col-md-12 {{ $errors->has('telefone') ? 'has-error' : '' }}">
						<label for="telefone">Telefone</label>
						<input type="text" name="telefone" id="phone">
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

<script type="text/javascript">
	$(document).ready(function(){
		$("input.datadenascimento").mask("99/99/9999");
		$("input.cpf").mask("999.999.999-99");
		$("input.cep").mask("99.999-999");
	});
</script>
<div class="container">
	<script type="text/javascript">
		jQuery(function($){
			$("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});  
		});
	</script>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<h3 class="page-header">Novo Tenista</h3>
				<form action="{{ route('tenista.salvar') }}" method="POST">
<script type="text/javascript">
	$(document).ready(function(){
		$("input.datadenascimento").mask("99/99/9999");
		$("input.cpf").mask("999.999.999-99");
		$("input.cep").mask("99.999-999");
	});
</script>
<div class="container">
	<script type="text/javascript">
		jQuery(function($){
			$("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});  
		});
	</script>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<h3 class="page-header">Novo Tenista</h3>
				<form action="{{ route('tenista.salvar') }}" method="POST">

					{{csrf_field()}}
					<div class="row">
						<div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
							<label for="nome">Nome</label>
							<input type="text" name="nome" value="{{old('nome')}}">
							@if($errors->has('nome'))
							<span class="help-block">
								<strong>{{ $errors->first('nome') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-6 {{ $errors->has('login') ? 'has-error' : '' }}">
							<label for="login">Login</label>
							<input type="text" name="login">
							@if($errors->has('login'))
							<span class="help-block">
								<strong>{{ $errors->first('login') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
							<label for="password">Senha</label>
							<input type="password" name="password">
							@if($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-12 {{ $errors->has('datadenascimento') ? 'has-error' : '' }}">
							<label for="DatadeNascimento">Data de Nascimento</label>
							<input type="text" name="datadenascimento"></input>
							@if($errors->has('datadenascimento'))
							<span class="help-block">
								<strong>{{ $errors->first('datadenascimento') }}</strong>
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
						<div class="form-group col-md-12 {{ $errors->has('email') ? 'has-error' : '' }}">
							<label for="email">E-mail</label>
							<input type="text" name="email">
							@if($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-12 {{ $errors->has('telefone') ? 'has-error' : '' }}">
							<label for="telefone">Telefone</label>
							<input type="text" name="telefone" id="phone">
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


						{{-- ACADEMIA --}}
						<div class="form-group col-md-12 {{ $errors->has('cidade') ? 'has-error' : '' }}">
							<label for="academia_id">Academia</label>
							
								<?php 
								
								$academias = DB::table('academias')->get();
								$valido = sizeof($academias);
								if ($valido > 0) {
									
									echo '<select name="academia_id">';
									foreach ($academias as $academia) {
										echo ('<option value="'.$academia->id.'">'.$academia->nome.'</option>');
									}
									echo '</select>';

								}else{
									echo ('<label for="academia_id">: O administrador deve cadastrar Academia</label>');
								}	

								?>		
							
							@if($errors->has('cidade'))
							<span class="help-block">
								<strong>{{ $errors->first('cidade') }}</strong>
							</span>
							@endif
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
						<div class="form-group col-md-12 " >
							{{Form::label('classes', 'Classes')}}
							{{Form::select('classe_id', ['1' => 'Classe A', '2' => 'Classe B', '3' => 'Classe C', '4' => 'Feminino'], '3')}}
							<!--Form::select('cat[]', $cats, null, ['multiple' => true, 'class' => 'form-control margin']) !!}-->
							@if($errors->has('classe'))
							<span class="help-block">
								<strong>{{ $errors->first('classe') }}</strong>
							</span>
							@endif
						</div>	
						<hr />

						<div class="col-md-12">
							<input type="hidden" name="statustenista_id" value="1">
							<button class="btn btn-info">Adicionar</button>
							<a href="#" class="btn btn-default">Cancelar</a>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

{{Html::script('js/jquery.maskedinput.js')}}
{{Html::script('js/jquery.js')}}

@endsection