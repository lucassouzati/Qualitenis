@extends('layouts.app')

@section('content')	

<div class="container">
    <div class="row form-horizontal">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default ">
            <h3 class="page-header">Cadastro de Torneio</h3>
            	{{Form::open(array('route' => 'torneio.salvar'))}}
            	{{Form::token()}}


				<div class="row">
					<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('cidade', 'Cidade')}}

					</div>
					<div class="form-group col-md-10 " >	
							<?php 
								$estado = \App\Estado::find(19);
								$cidades = $estado->cidades->lists('nome', 'id');
								
								//foreach ($cidades as $cidade) {
								# code...
								//echo ('<option value="'.$cidade->id.'">'.$cidade->nome.'</option>');
								//{{Form::select('cidade_id[]', $cidades, null, ['multiple'=>'multiple'])}}	
								//}	
							?>	
							{{Form::select('cidade_id', $cidades, null)}}*	
							
					</div>
				</div>
				<div class="row">
					<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('data', 'Data')}}
					</div>
					<div class="form-group col-md-10 " >
						{{Form::text('data')}}*
						@if($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data') }}</strong>
                                </span>
                            @endif
					</div>
				</div>
				<div class="row">
					<div class="control-label col-md-offset-0 col-md-2">
						{{Form::label('precodainscricao', 'Preço da inscrição')}}
					</div>
					<div class="form-group col-md-10 " >
						{{Form::number('precodainscricao')}}*
						@if($errors->has('precodainscricao'))
                                <span class="help-block">	
                                    <strong>{{ $errors->first('precodainscricao') }}</strong>
                                </span>
                            @endif
					</div>
				</div>
				<div class="row">
					<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('informacoes', 'Informações')}}
					</div>
					<div class="form-group col-md-10 " >
						{{Form::text('informacoes')}}*
						@if($errors->has('informacoes'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('informacoes') }}</strong>
                                </span>
                            @endif
					</div>
				</div>
				<div class="row">
					<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('classes', 'Classes')}}
					</div>
					<div class="form-group col-md-10 " >
						{{Form::select('classes[]', ['1' => 'Classe A', '2' => 'Classe B', '3' => 'Classe C', '4' => 'Feminino'], null, ['multiple' => 'multiple'])}}*
						<!--Form::select('cat[]', $cats, null, ['multiple' => true, 'class' => 'form-control margin']) !!}-->
						@if($errors->has('classes'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('classes') }}</strong>
                                </span>
                            @endif
					</div>	
					<div class="row">
						<div class="col-md-offset-1 col-md-11">
							<p class="help-block">* Campo Obrigatório</p>	
						</div>									
					</div>
				</div>
				<div class="row">
					<hr />
  					
    					<div class="col-md-offset-1 col-md-1">
							{{Form::submit('Adicionar')}}
						</div>
						<div class="col-md-10">
							<a href="{{route('torneio.index')}}" class="btn btn-default">Cancelar</a>
						</div>
  					
				</div>



            	{{Form::close()}}
            	<!--
				<form action="{{ route('torneio.salvar') }}" method="POST">
				{{csrf_field()}}

				<div class="row">
					<div class="form-group col-md-12">
					<?php /*
						{{Form::label('"Cidade">Cidade</label>
						<select name="cidade_id">
							<?php 
								/*$estado = \App\Estado::find(19);
								$cidades = $estado->cidades; 
								foreach ($cidades as $cidade) {
								# code...
								echo ('<option value="'.$cidade->id.'">'.$cidade->nome.'</option>');

								}	
							*/?>		
						</select>
					</div>
					<div class="form-group col-md-12 " >
						{{Form::label('"data">Data</label>
						{{Form::text('data">
					</div>

					<div class="form-group col-md-6">
						{{Form::label('"precodainscricao">Preço da inscrição</label>
						<input type="number" name="prescodainscricao">
					</div>
					
					<div class="form-group col-md-6">
						{{Form::label('"numerodechaveamentos">Número de chaveamentos</label>
						<input type="number" name="numberodechaveamentos">
						<input type="hidden" name="statustenista_id" value="1">
					</div>
					<div class="form-group col-md-12 " >
						{{Form::label('"informacoes">Informações</label>
						<textarea type="text" name="informacoes"></textarea>
					</div>
					<div class="form-group col-md-12 " >
						{{Form::label('"classes">Classes</label>
						<select multiple="multiple" name="classes[]" id="classes">
							<option value="1">Classe A</option>
							<option value="2">Classe B</option>
							<option value="3">Classe C</option>
							<option value="4">Feminino</option>
						</select>
					</div>					
					
					<hr />
  					
    					<div class="col-md-12">
							
							<button class="btn btn-info">Adicionar</button>
							<a href="#" class="btn btn-default">Cancelar</a>
						</div>
  					
				</div>
				</form>
				*/
				?>-->
            </div>
        </div>
    </div>
</div>

@endsection