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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Novo Tenista</div>
            <div class="panel-body">
				<form class="form-horizontal" action="{{ route('tenista.salvar') }}" method="POST" class="form-horizontal">
				
						{{csrf_field()}}
				
					<div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
						<label for="nome" class="col-md-4 control-label">Nome</label>
						<input type="text" name="nome" value="{{old('nome')}}">*
						 <div class="col-md-6">
							@if($errors->has('nome'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                          </div>
					</div>
					<div class="form-group{{ $errors->has('login') ? 'has-error' : '' }}">
						<label for="login" class="col-md-4 control-label">Login</label>
						<input type="text" name="login">
						<div class="col-md-6">
							@if($errors->has('login'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>
					<div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Senha</label>
						<input type="password" name="password">
						<div class="col-md-6">
							@if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                         </div>
					</div>
						<div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Confirmar senha</label>
						<input type="password" name="password_confirmation">
						<div class="col-md-6">
							@if($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>
					<div class="form-group{{ $errors->has('datadenascimento') ? 'has-error' : '' }}">
						<label for="DatadeNascimento" class="col-md-4 control-label">Data de Nascimento</label>
						<input type="text" name="datadenascimento" id="date"/>
						<div class="col-md-6">
							@if($errors->has('datadenascimento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('datadenascimento') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>
					<div class="form-group{{ $errors->has('sexo') ? 'has-error' : '' }}">
					<label class="col-md-4 control-label">Sexo*</label>
					<label class="col-md-offset-1"/>
						<input type="radio" name="sexo" value="M">Masculino<br/>
	  					<input type="radio" name="sexo" value="F">Feminino<br/>
	  					<div class="col-md-6">
		  					@if($errors->has('sexo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sexo') }}</strong>
                                </span>
                            @endif
                        </div>
	  				</div>
					<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">E-mail</label>
						<input type="text" name="email">
						<div class="col-md-6">
							@if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>
					<div class="form-group{{ $errors->has('telefone') ? 'has-error' : '' }}">
						<label for="telefone" class="col-md-4 control-label">Telefone</label>
						<input type="text" name="telefone" id="phone">
						<div class="col-md-6">
							@if($errors->has('telefone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                            @endif
                        </div>
					</div>
					


						{{-- ACADEMIA --}}
						<div class="form-group{{ $errors->has('academia') ? 'has-error' : '' }}">
							<label for="academia_id" class="col-md-4 control-label">Academia</label>
							
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
							
								@if($errors->has('academia'))
									<span class="help-block">
										<strong>{{ $errors->first('academia') }}</strong>
									</span>
								@endif
							
						</div>
						
						<div class="form-group">
							
								<label class="col-md-4 control-label">{{Form::label('estado', 'Estado')}} </label>
							
							
								{{Form::select('estado_id', $estados, null, ['id' => 'estado_id'])}}
							
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">{{Form::label('cidade', 'Cidade')}}</label>
							<select name="cidade_id" id="cidade_id" required>
							</select>
								@if($errors->has('cidade_id'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('cidade_id') }}</strong>
	                                </span>
	                            @endif
						</div>
						<div class="form-group" >
							
							<label class="col-md-4 control-label">{{Form::label('classes', 'Classes')}}</label>
							
							
							{{Form::select('classe_id', ['1' => 'Classe A', '2' => 'Classe B', '3' => 'Classe C', '4' => 'Feminino'], '3')}}*
							<!--Form::select('cat[]', $cats, null, ['multiple' => true, 'class' => 'form-control margin']) !!}-->
							@if($errors->has('classe'))
							<span class="help-block">
								<strong>{{ $errors->first('classe') }}</strong>
							</span>
							
							@endif
						</div>	
						<hr />

						<div class="col-md-offset-1 col-md-11 ">
							<input type="hidden" name="statustenista_id" value="1">
							<button class="btn btn-info">Adicionar</button>
							<a href="#" class="btn btn-default">Cancelar</a>
						</div>

					
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="script_jquery.js" type="text/javascript"></script>
<script src="jquery.js" type="text/javascript"></script>	
<script type="text/javascript">
	$(document).ready(function(){
		$("input.datadenascimento").mask("99/99/9999");
		$("input.cpf").mask("999.999.999-99");
		$("input.cep").mask("99.999-999");
	});
</script>
<!--{{Html::script('js/jquery.js')}} -->
<!-- InputMask -->
<script src="{{asset('js/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('js/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script>

  /* Load positions into postion <selec> */
  $( "#estado_id" ).change(function() 
  {
    $.getJSON("/estado/"+ $(this).val() +"/cidades", function(jsonData){
        select = '<select name="cidade_id" class="form-control" required id="cidade_id" >';
          $.each(jsonData, function(i,data)
          {
               select +='<option value="'+data.id+'">'+data.nome+'</option>';
           });
        select += '</select>';
        $("#cidade_id").html(select);
    });
  });
</script>




@endsection