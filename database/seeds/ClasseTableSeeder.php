<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ClasseTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
         DB::table('classes')->insert([
            ['nome' => "Classe A"],
            ['nome' => "Classe B"],
            ['nome' => "Classe C"],
            ['nome' => "Feminino"],
            
            
        ]);
    }
}



