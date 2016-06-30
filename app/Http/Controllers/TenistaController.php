<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TenistaController extends Controller
{
    //
    public function adicionar()
    {	
    	
    	return view('tenista.adicionar');
    }
}
