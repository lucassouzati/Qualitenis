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
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <h3 class="page-header">Cadastro de Torneio</h3>
				<form action="{{ route('tenista.salvar') }}" method="POST">
				{{csrf_field()}}

				<div class="row">
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
					<div class="form-group col-md-12 " >
						<label for="data">Data</label>
						<input type="text" name="data">
					</div>

					<div class="form-group col-md-6">
						<label for="precodainscricao">Preço da inscrição</label>
						<input type="number" name="prescodainscricao">
					</div>
					<div class="form-group col-md-6">
						<label for="numerodechaveamentos">Número de chaveamentos</label>
						<input type="number" name="numberodechaveamentos">
						<input type="hidden" name="statustenista_id" value="1">
					</div>
					<div class="form-group col-md-12 " >
						<label for="informacoes">Informações</label>
						<textarea name=""><input type="text" name="informacoes"></textarea>
					</div>					
					
					<hr />
  					
    					<div class="col-md-12">
							
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
@endsection