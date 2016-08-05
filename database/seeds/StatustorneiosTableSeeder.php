<?php

use Illuminate\Database\Seeder;

class StatustorneiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('statustorneios')->insert([
            ['nome' => "Inativo"],
            ['nome' => "Ativo"],
            ['nome' => "Cancelado"],
            ['nome' => "Concluído"],
            
        ]);
    }
}
