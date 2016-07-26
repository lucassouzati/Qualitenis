

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li><a href="{{ url('/tenista') }}">Tenista {{auth()->guard('tenista')->user()->nome}}</a></li>
                    <li class="active">Detalhe</li>
                </ol>

                <div class="panel-body">
                
                   <p><b>Nome: {{ auth()->guard('tenista')->user()->nome }}</b></p>
                   <p><b>Data: {{date_format(date_create_from_format('Y-m-d',  auth()->guard('tenista')->user()->datadenascimento), 'd/m/Y')}}</b></p>
                   <p><b>Cidade: {{auth()->guard('tenista')->user()->cidade->nome}}</b></p>
                   <p><b>Academia: {{auth()->guard('tenista')->user()->academia->nome}}</b></p>
                   <p><b>Status: {{ auth()->guard('tenista')->user()->statustenista->nome }}</b></p>
                   <p><b>E-mail: {{auth()->guard('tenista')->user()->email }}</b></p>
                   <p><b>Telefone: {{auth()->guard('tenista')->user()->telefone }}</b></p>
                   <p><b>Classe: {{auth()->guard('tenista')->user()->classe->nome}}</b></p>
                    
                     <a class="btn btn-default" href="{{ route('tenista.editar', auth()->guard('tenista')->user()->id ) }}" {{ auth()->guard('tenista')->user()->statustenista->id == 1 ? '' : 'disabled="true"' }}>Editar</a>
                     <form action="{{route('tenista.trocastatus', auth()->guard('tenista')->user()  ->id)}}" method="POST" onsubmit="return confirm('Deseja realmente desativar essa conta? Você não poderá logar de novo até que um administrador ative seu usuário novamente.');" class="btn">
                     {{csrf_field()}}
                         <input type="hidden" name="statustenista_id" value="2">
                         <input type="hidden" name="_method" value="put" placeholder="">
                       
                                    <input type="submit" name="" class="btn btn-danger" value="Desativar Conta" placeholder="">
                    </form>
                   
                        
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection