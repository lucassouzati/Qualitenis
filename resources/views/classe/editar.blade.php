@extends('layouts.app')

@section('content')	
<div class="container">
  @can('Classe_adicionar')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<h3 class="page-header">Dados do Academia</h3>
				<form action="{{ route('Classe.atualizar', $classe->id) }}" method="POST">
					{{csrf_field()}}
					<div class="row">
						<input type="hidden" name="_method" value="put">
						<div class="form-group col-md-12">
							<label for="nome">Nome</label>
							<input type="text" name="nome" value="{{$classe->nome}}">
						</div>						
						<div class="form-group col-md-12">
							<button class="btn btn-info">Salvar</button>
							<a href="#" class="btn btn-default">Cancelar</a>
						</div>
					</div>	
					</form>

				</div>
			</div>
		</div>
		@endcan
	</div>

	<script src="script_jquery.js" type="text/javascript"></script>
	@endsection