<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CidadeController extends Controller
{
    //
    public function getCidadesPorEstado($idestado)
    {
        if (\Request::ajax())
        {
            $cidades = \DB::table('cidades')->select('id','nome')->where('estado_id', '=', $idestado)->get();
            return \Response::json( $cidades );
        } 
    }
}
