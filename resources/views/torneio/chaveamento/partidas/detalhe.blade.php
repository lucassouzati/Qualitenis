@extends('layouts.app')

@section('content')
<div class="container">
    @can('partida_index')
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel">
	            <div class="panel-body no-padding-top bg-white">                    
	                <div class="table-responsive">
	                    <table class="table table-bordered table-striped table-hover">
	                        <tbody>
	                            <tr>
	                                <th>ID</th><td>{{ $partida->id }}</td>
	                            </tr>
	                            <tr><th> Vencedor </th><td> {{ $partida->vencedor }} </td></tr>
	                            <tr><th> Jogador 1 </th><td> {{ $partida->jogador1->nome }} </td></tr>
	                            <tr><th> Set jogador 1 </th><td> {{ $partida->setjogador1 }} </td></tr>
	                            <tr><th> Jogador 2 </th><td> {{ $partida->jogador2->nome }} </td></tr>
	                            <tr><th> Set jogador 2 </th><td> {{ $partida->setjogador2 }} </td></tr>
	                            <tr><th> Data </th><td> {{ $partida->data }} </td></tr>
	                            <tr><th> Status </th><td> {{ $partida->status }} </td></tr>

	                        </tbody>
	                    </table>
	                </div>    
	           </div>
        	</div>
    	</div>
    </div>
    @endcan
</div>

@endsection