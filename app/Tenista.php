<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenista extends Model
{
    //
    protected $fillable = ["login", "emailunique", "senha", "nome", "telefone", "cidade", "datadenascimento", "cpf", "statustenista"];
    public function cidade()
    {
    	return $this->hasOne('App\Cidade');
    }

    public function statustenistas()
    {
    	return $this->hasOne('App\Statustenista');
    }
}
