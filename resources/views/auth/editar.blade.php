@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="{{ route('Auth.atualizar', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('CPF') ? ' has-error' : '' }}">
                            <label for="CPF" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="CPF" type="CPF" class="form-control" name="CPF" value="{{ $user->CPF }}">

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
                                <option  value="{{$user->cidade->id}}">{{$user->cidade->nome}}</option>
                                    <?php 
                                    $estado = \App\Estado::find(19);
                                    $cidades = $estado->cidades; 
                                    foreach ($cidades as $cidade) {


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
                        <div class="form-group {{ $errors->has('academia') ? 'has-error' : '' }}">
                            <label for="academia_id" class="col-md-4 control-label">Academia</label>
                            <div class="col-md-6">
                                <?php 
                                
                                $academias = DB::table('academias')->get();
                                $valido = sizeof($academias);
                                if ($valido > 0) {

                                    echo '<select name="academia_id">';
                                    //echo '<option  value="'.$user->academia->id.'">'$user->academia->nome.'</option>';
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

                                @if($errors->has('academia'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('academia') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>

                            <div class="col-md-6">
                                <input id="telefone" type="telefone" class="form-control" name="telefone" value="{{ $user->telefone }}">

                                @if ($errors->has('telefone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input disabled="" id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
