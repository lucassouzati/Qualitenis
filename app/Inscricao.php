<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    //
    protected $table = "inscricoes";

    protected $fillable = ['tenista_id', 'torneio_id', 'chaveamento_id', 'pago', 'status', 'prazodepagamento'];

    public function tenista()
    {
        return $this->belongsTo('App\Tenista');
    }

    public function torneio()
    {
        return $this->belongsTo('App\Torneio');
    }

    public function chaveamento()
    {
        return $this->belongsTo('App\Chaveamento');
    }
}
