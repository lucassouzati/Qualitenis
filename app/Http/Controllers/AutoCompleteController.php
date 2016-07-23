<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tenista;

class AutoCompleteController extends Controller
{
    //
    public function index(){
        return view('autocomplete.index');
   }

    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        
        $tenistas=Tenista::where('nome','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($tenistas as $tenista) {
                $data[]=array('url'=>route('tenista.detalhe',$tenista->id), 'value'=> $tenista->nome,'id'=>$tenista->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
    
}
