<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
