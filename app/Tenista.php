<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tenista extends Authenticatable
{
    //
    protected $fillable = ["login", "email", "password", "nome", "telefone", "cidade_id", "datadenascimento", "cpf", "statustenista_id", "academia_id", "classe_id", "activated"];
    public function cidade()
    {
    	return $this->belongsTo('App\Cidade');
    }

    public function statustenista()
    {
        return $this->belongsTo('App\Statustenista');
    }

    public function classe()
    {

    	return $this->belongsTo('App\Classe');
    }

    public function academia()
    {
        return $this->belongsTo('App\Academia');
    }

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];


}
