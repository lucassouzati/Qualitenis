{{auth()->guard('tenista')->user()->nome}}

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
                   <p><b>Status: {{ auth()->guard('tenista')->user()->statustenista->nome }}</b></p>
                   <p><b>E-mail: {{auth()->guard('tenista')->user()->email }}</b></p>
                   <p><b>Telefone: {{auth()->guard('tenista')->user()->telefone }}</b></p>
                   <p><b>Classe: {{auth()->guard('tenista')->user()->classe->nome}}</b></p>
                
                     <a class="btn btn-default" href="{{ route('tenista.editar', auth()->guard('tenista')->user()->id ) }}" {{ auth()->guard('tenista')->user()->statustenista->id == 1 ? '' : 'disabled="true"' }}>Editar</a>
                                    <a class="btn btn-danger" href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{ route('tenista.trocastatus', auth()->guard('tenista')->user()->id) }}' : false)" {{ auth()->guard('tenista')->user()->statustenista->id == 1 ? '' : 'disabled="true"' }}>Desativar Conta</a>
                    
                   
                        
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection