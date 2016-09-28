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
    protected $fillable = ['data', 'jogador1_id', 'jogador2_id', 'setjogador1', 'setjogador2', 'vencedor', 'status', 'nivel', 'chaveamento_id', 'partidaanterior1_id', 'partidaanterior2_id'];



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

     public static function geraPartidas($chaveamento_id, $qtdjogadores)
    {
        $chaveamento = \App\Chaveamento::find($chaveamento_id);
        if($qtdjogadores < 16)
        {
            if($qtdjogadores < 8)
            {
                if($qtdjogadores < 4)
                {
                    $qtddepartidas = 4;
                    $qtddepartidasnivel2 = 1;
                }
                else
                {
                    $qtddepartidas = 4;
                    $qtddepartidasnivel2 = 2;
                    $qtddepartidasnivel3 = 1;
                    }
            }
            else
            {
                $qtddepartidas = 8;
                $qtddepartidasnivel2 = 4;
                $qtddepartidasnivel3 = 2;
                $qtddepartidasnivel4 = 1;
            }
        }
        else
        {
            $qtddepartidas = 16;
            $qtddepartidasnivel2 = 8;
            $qtddepartidasnivel3 = 4;
            $qtddepartidasnivel4 = 2;
            $qtddepartidasnivel5 = 1;

        }

        $numeracaodepartidas = 0;
        for($i = 0; $i < $qtddepartidas; $i++)
        {
            $numeracaodepartidas++;   
            Partida::create(['data' => $chaveamento->data, 'jogador1_id' => 0, 'jogador2_id' => 0, 'status' => 'Não definida', 'nivel' => 1, 'chaveamento_id' => $chaveamento->id], 'numero' => $numeracaodepartidas); 
            
        }

        for($i = 0; $i < $qtddepartidasnivel2; $i++)
        {
            $numeracaodepartidas++;   
            Partida::create(['data' => $chaveamento->data, 'jogador1_id' => 0, 'jogador2_id' => 0, 'status' => 'Não definida', 'nivel' => 2, 'chaveamento_id' => $chaveamento->id], 'numero' => $numeracaodepartidas);    
            
        }

        if(isset($qtddepartidasnivel3)){
            for($i = 0; $i < $qtddepartidasnivel3; $i++)
            {
                $numeracaodepartidas++;   
                Partida::create(['data' => $chaveamento->data, 'jogador1_id' => 0, 'jogador2_id' => 0, 'status' => 'Não definida', 'nivel' => 3, 'chaveamento_id' => $chaveamento->id], 'numero' => $numeracaodepartidas);
            }

        }

        if(isset($qtddepartidasnivel4)){
            for($i = 0; $i < $qtddepartidasnivel4; $i++)
            {
                $numeracaodepartidas++;   
                Partida::create(['data' => $chaveamento->data, 'jogador1_id' => 0, 'jogador2_id' => 0, 'status' => 'Não definida', 'nivel' => 4, 'chaveamento_id' => $chaveamento->id], 'numero' => $numeracaodepartidas);
            }

        }

        if(isset($qtddepartidasnivel5)){
            for($i = 0; $i < $qtddepartidasnivel5; $i++)
            {
                $numeracaodepartidas++;   
                Partida::create(['data' => $chaveamento->data, 'jogador1_id' => 0, 'jogador2_id' => 0, 'status' => 'Não definida', 'nivel' => 5, 'chaveamento_id' => $chaveamento->id], 'numero' => $numeracaodepartidas);    
                
            }

        }
        
    }

     /**
     * Scope a query to only include partidas definidas.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDefinidas($query)
    {
        return $query->where('status', '<>', 'Não definida');
    } 

    /**
     * Scope a query to only include partidas por nivel.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNivel($query, $nivel)
    {
        return $query->where('nivel', $nivel);
    }
}
