@extends('layouts.app')


@section('content')
<div class="container">
    @can('Funcionario_registrar')
    <script type="text/javascript" src="resources/views/layouts/_includes/validarCPF.js"></script>

    <script>
        function TestaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;
            if (strCPF == "00000000000") return false;
            
            for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
               Resto = (Soma * 10) % 11;
            
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
            
            Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;
            
            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
            return true;
        }  

        
        function validarForm() {
            
              var CPF = document.getElementById('CPF').value; 
              var valido = TestaCPF(CPF);
              if (valido == true){
               return true; 
              }else{
                alert("CPF Invalido! Preencher CPF valido.");
                return false;
              }   

            
        }
    </script>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
                <div class="panel-body">
                    <form name="registrar" class="form-horizontal" role="form" method="POST" onsubmit="return validarForm()" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('papel') ? 'has-error' : '' }}">
                            <label for="papel_id" class="col-md-4 control-label">Função</label>
                            <div class="col-md-6">
                                <?php 
                                
                                $papeis = DB::table('papels')->get();
                                $valido = sizeof($papeis);
                                if ($valido > 0) {

                                    echo '<select name="papel_id">';

                                    foreach ($papeis as $papel) {
                                       
                                        echo ('<option value="'.$papel->id.'">'.$papel->nome.'</option>');
                                    }
                                    
                                    echo '</select>';

                                }
                                ?>      

                                @if($errors->has('cidade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cidade') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        {{-- CPF --}}
                        <div class="form-group{{ $errors->has('CPF') ? ' has-error' : '' }}">
                            <label for="CPF" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="CPF" type="text" onfocusout="validarForm()" class="form-control" name="CPF" value="{{ old('CPF') }}">

                                @if ($errors->has('CPF'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('CPF') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cidade') ? 'has-error' : '' }}">
                            <label for="cidade_id" class="col-md-4 control-label">Cidade</label>
                            <div class="col-md-6">
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
                        </div>
                        {{-- ACADEMIA --}}
                        <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
                            <label for="academia_id" class="col-md-4 control-label">Academia</label>
                            <div class="col-md-6">
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
                                    ?>
                                        <a class="btn btn-default" href="{{route('Academia.adicionar')}}">Adicionar</a>
                                    <?php
                                         
                                    
                                }   

                                ?>      

                                @if($errors->has('cidade'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cidade') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="number" class="form-control" name="telefone" value="{{ old('telefone') }}">

                                @if ($errors->has('telefone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     @endcan
</div>
@endsection
