<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InscreverEmTorneio extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $tenista = \App\Tenista::find(1);
        $this->actingAs($tenista, 'tenista')
        ->visit('/tenista')
        ->see('Tenista '. $tenista->nome)
        ->click('torneio_1')
        ->see('Detalhes do Torneio')
        ->check('termos')
        ->press('Inscrever');
    }
}
