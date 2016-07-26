<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TenistasTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        factory('App\Tenista',100)->create();
    }
}
