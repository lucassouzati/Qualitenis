<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use \App\EnumTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partidas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['data', 'jogador1_id', 'jogador2_id', 'setjogador1', 'setjogador2', 'vencedor', 'status', 'nivel', 'chaveamento_id'];



    public function jogador1(){
        return $this->belongsTo('App\Tenista');
    }

    public function jogador2(){
        return $this->belongsTo('App\Tenista');
    }

    public function chaveamento(){
        return $this->belongsTo('App\Chaveamento');
    }

    public static function getPossbileStatuses(){
        $status = \DB::select(DB::raw('SHOW COLUMNS FROM partida WHERE Field = "type"'))[0]->Type;
        dd($status);
    }
}
