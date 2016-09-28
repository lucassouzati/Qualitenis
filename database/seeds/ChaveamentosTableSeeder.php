<?php

use Illuminate\Database\Seeder;

class ChaveamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('chaveamentos')->insert([
        	'numerodejogadores' => 16,
        	'torneio_id' => 1,
        	'classe_id' => 3,
        	'vagas' => 0,
        ]);

        \App\Partida::geraPartidas(1, 8);
        
    }
}
