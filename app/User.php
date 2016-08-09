<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissao;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','CPF', 'email', 'password','telefone', 
    ];

    public function telefones()
    {
        return $this->hasMany('App\telefone');
    }
    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }
    public function academia()
    {
        return $this->belongsTo('App\Academia');
    }

    public function Papeis()
    {
        return $this->belongsToMany(\App\Papel::class);
    }

    public function temPermissao($permissao)
    {   
        return $this->temPapeis($permissao->pepels);
    }

    public function temPapeis($papeis)
    {
        if( is_array($papeis) || is_object($papeis) ){
           foreach ($papeis as $papel) {
               $this->temPapeis($papel);
           }
        }

        return $this->papeis->contains('name', $papeis);
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
