<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
          DB::table('users')->insert(
            ['name' => "Administrador",
            
            'cpf' => "11111111111",
            'email' => "admin@admin",
            'password' => bcrypt("admin")

            ]
            );
                       
            
        
    }
}
