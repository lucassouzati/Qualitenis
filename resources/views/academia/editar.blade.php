@extends('layouts.app')

@section('content')	
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<h3 class="page-header">Dados do Academia</h3>
				<form action="{{ route('Academia.atualizar', $academia->id) }}" method="POST" class="form-horizontal">
					{{csrf_field()}}
					<div class="row">
						<input type="hidden" name="_method" value="put">
						<div class="control-label col-md-offset-1 col-md-1">
              				<label for="nome">Nome</label>
              			</div>
              			<div class="form-group col-md-10">
							<input type="text" name="nome" value="{{$academia->nome}}">
						</div>
						<div class="control-label col-md-offset-1 col-md-1">
							<label for="Cidade">Cidade</label>
						</div>
              			<div class="form-group col-md-10">
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
						<div class="control-label col-md-offset-1 col-md-1">
							<label for="CNPJ">CNPJ</label>
						</div>
              			<div class="form-group col-md-10">
							<input type="text" name="CNPJ" value="{{$academia->CNPJ}}">
						</div>
						<div class="control-label col-md-offset-1 col-md-1">
							<label for="numQuadras">Quadras</label>
						</div>
              			<div class="form-group col-md-10">
							<input type="text" name="numQuadras" value="{{$academia->numQuadras}}">
						</div>
						<div class="col-md-offset-1 col-md-1">
							<button class="btn btn-info">Salvar</button>
						</div>
              			<div class="col-md-10">
							<a href="{{route('Academia.index')}}" class="btn btn-default">Cancelar</a>
						</div>
						<div class="col-md-12"/>
					</form>

				</div>
			</div>
		</div>
	</div>
	<script src="script_jquery.js" type="text/javascript"></script>
	@endsection