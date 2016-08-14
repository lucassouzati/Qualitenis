@extends('layouts.app')

@section('content')	
<div class="container">
	@can('Academia_editar')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<h3 class="page-header">Dados do Academia</h3>
				<form action="{{ route('Academia.atualizar', $academia->id) }}" method="POST">
					{{csrf_field()}}
					<div class="row">
						<input type="hidden" name="_method" value="put">
						<div class="form-group col-md-12">
							<label for="nome">Nome</label>
							<input type="text" name="nome" value="{{$academia->nome}}">
						</div>
						<div class="form-group col-md-12">
							<label for="Cidade">Cidade</label>
							<select name="cidade_id">
								<option  value="{{$academia->cidade->id}}">{{$academia->cidade->nome}}</option>
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
							<label for="CNPJ">CNPJ</label>
							<input type="text" name="CNPJ" value="{{$academia->CNPJ}}">
						</div>
						<div class="form-group col-md-12">
							<label for="numQuadras">Quadras</label>
							<input type="text" name="numQuadras" value="{{$academia->numQuadras}}">
						</div>
						<div class="form-group col-md-12">
							<button class="btn btn-info">Salvar</button>
							<a href="#" class="btn btn-default">Cancelar</a>
						</div>
					</form>

				</div>
			</div>
		</div>
		@endcan
	</div>
	<script src="script_jquery.js" type="text/javascript"></script>
	@endsection