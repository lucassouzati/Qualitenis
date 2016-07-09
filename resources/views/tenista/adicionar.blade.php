@extends('layouts.app')

@section('content')	
<script type="text/javascript">
$(document).ready(function(){
	$("input.data").mask("99/99/9999");
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
            <h3 class="page-header">Cadastro de Tenista</h3>
				<form action="{{ route('tenista.salvar') }}" method="POST">
				
						{{csrf_field()}}
				<div class="row">
					<div class="form-group col-md-12 {{ $errors->has('nome') ? 'has-error' : '' }}">
						<label for="nome">Nome</label>
						<input type="text" name="nome">
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
					<div class="form-group col-md-6 {{ $errors->has('senha') ? 'has-error' : '' }}">
						<label for="senha">Senha</label>
						<input type="password" name="senha">
						@if($errors->has('senha'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('senha') }}</strong>
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
<script src="script_jquery.js" type="text/javascript"></script>
<script src="jquery.js" type="text/javascript"></script>
@endsection