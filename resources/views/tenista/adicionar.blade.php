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
					<div class="form-group col-md-12">
						<label for="nome">Nome</label>
						<input type="text" name="nome">
					</div>
					<div class="form-group col-md-6">
						<label for="login">Login</label>
						<input type="text" name="login">
					</div>
					<div class="form-group col-md-6">
						<label for="senha">Senha</label>
						<input type="password" name="senha">
					</div>
					<div class="form-group col-md-12">
						<label for="DatadeNascimento">Data de Nascimento</label>
						<input type="text" name="datadenascimento" id="date"></input>
			
					</div>
					<div class="form-group col-md-12">
						<label for="email">E-mail</label>
						<input type="text" name="email">
					</div>
					<div class="form-group col-md-12">
						<label for="telefone">Telefone</label>
						<input type="text" name="telefone" id="phone">
					</div>
					<div class="form-group col-md-12">
						<label for="Estado">Estado</label>
						<select name="estado">
			
						</select>

					</div>
					<div class="form-group col-md-12">
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