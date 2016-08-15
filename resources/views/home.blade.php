@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Menu/div>

                <div class="panel-body">
                   Você está logado!
                    <ul>
                      @can('Academia')
                         <li>
                             <a href="{{route('Academia.index')}}" "email me">Academias</a>
                         </li>
                      @endcan
                       <li>
                           <a href="{{route('torneio.index')}}" "email me">Torneios</a>
                       </li>
                       @can('Classe')
                         <li>
                             <a href="{{route('Classe.adicionar')}}" "email me">Classe</a>
                         </li>
                       @endcan
                        @can('Funcionario_index')
                         <li>
                             <a href="{{route('auth.index')}}" "email me">Funcionarios</a>
                         </li>
                        @endcan
                       <li>
                           <a href="{{route('tenista.lista')}}" "email me">Tenistas</a>
                       </li>

                    </ul>   
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
