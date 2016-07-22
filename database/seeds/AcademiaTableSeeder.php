<?php

use Illuminate\Database\Seeder;

class AcademiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academias')->insert([
            'nome' => "Teste",
            'cidade_id' => "1",
            'CNPJ' => "99.999.999/9999-99",
            'numQuadras' => "1"
            
            
        ]);
    }
}
