@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <ul>
                       <li>
                           <a href="{{route('torneio.index')}}" "email me">Torneios</a>
                       </li>
                       <li>
                           <a href="{{route('academia.index')}}" "email me">Academias</a>
                       </li>

                    </ul>   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
