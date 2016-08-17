@extends('layouts.app')

@section('content')	

<div class="container">

	@can('Torneio_adicionar')
    <div class="row  form-horizontal">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default ">
            <h3 class="page-header">Cadastro de Torneio</h3>
	            	{{Form::open(array('route' => 'torneio.salvar'))}}
            	{{Form::token()}}


				<div class="row">
					<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('estado', 'Estado')}} 
					</div>
					<div class="form-group col-md-10 " >	
						{{Form::select('estado_id', $estados, null, ['id' => 'estado_id'])}}
					</div>
				</div>
				<div class="row">
					<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('cidade', 'Cidade')}}

					</div>
					<div class="form-group col-md-10 " >	
						<select name="cidade_id" id="cidade_id" required>
							
						</select>*
							@if($errors->has('cidade_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cidade_id') }}</strong>
                                </span>
                            @endif
					</div>
				</div>
				<!--
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
				-->
				<div class="row">
					
                	<div class="control-label col-md-offset-1 col-md-1">
						{{Form::label('data', 'Data')}}
					</div>
					<div class="form-group col-md-4 {{ $errors->has('data') ? 'has-error' : '' }}">
		                <div class="input-group">
		                  <input type="text" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datemask" name="data" required="true">*
		                  @if($errors->has('data'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('data') }}</strong>
                                </span>
                            @endif
		                </div>
	                <!-- /.input group -->
              		</div>
				</div>
				<div class="row">
					<div class="control-label col-md-offset-0 col-md-2">
						{{Form::label('precodainscricao', 'Preço da inscrição (R$)')}}
					</div>
					<div class="form-group col-md-10 {{ $errors->has('precodainscricao') ? 'has-error' : '' }}" >
						{{Form::number('precodainscricao', null, ['required'=>'true'])}}*
						@if($errors->has('precodainscricao'))
                                <span class="help-block">	
                                    <strong>{{ $errors->first('precodainscricao') }}</strong>
                                </span>
                            @endif
					</div>
				</div>
				<div class="row">
					<div class="control-label col-md-2">
						{{Form::label('informacoes', 'Informações')}}
					</div>	
					<div class="form-group col-md-10" >
						<textarea name="informacoes" rows="3" class="col-md-8"></textarea>
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
					<div class="form-group col-md-10 {{ $errors->has('classes') ? 'has-error' : '' }}" >
						{{Form::select('classes[]', ['1' => 'Classe A', '2' => 'Classe B', '3' => 'Classe C', '4' => 'Feminino'], null, ['multiple' => 'multiple', 'required'=>'true'])}}*
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
							{{Form::submit('Adicionar', ['class' =>'btn btn-info btn-default'])}}
						</div>
						<div class="col-md-10">
							<a href="{{route('torneio.index')}}" class="btn btn-default">Cancelar</a>
						</div>
  					
				</div>

            	{{Form::close()}}
            	
				
            </div>
        </div>
    </div>
    @endcan
</div>
<!-- bootstrap datepicker -->
<script src="{{asset('js/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('js/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script>
$(function () {
	//Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	
});
  /* Load positions into postion <selec> */
  $( "#estado_id" ).change(function() 
  {
    $.getJSON("/estado/"+ $(this).val() +"/cidades", function(jsonData){
        select = '<select name="cidade_id" class="form-control" required id="cidade_id" >';
          $.each(jsonData, function(i,data)
          {
               select +='<option value="'+data.cidade_id+'">'+data.nome+'</option>';
           });
        select += '</select>';
        $("#cidade_id").html(select);
    });
  });
</script>
@endsection