<?php

use Illuminate\Database\Seeder;

class TorneiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('torneios')->insert([
        	'data' => '2016-09-30',
        	'cidade_id' => '6768',
        	'informacoes' => '',
        	'precodainscricao' => '40',
        	'numerodechaveamentos' => '1',
        	'statustorneio_id' => '2',
        	]);
        
    }
}
