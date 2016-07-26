<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chaveamento extends Model
{
    //
    protected $fillable = ["numeredejogadores", "torneio", "classe"];

    public function torneio()
    {
        return $this->belongsTo('App\Torneio');
    }

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }
}
