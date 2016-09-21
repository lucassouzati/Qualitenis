<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InscricoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('inscricoes')->insert([
    		['tenista_id' => 1, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 2, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 3, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 4, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 5, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 6, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 7, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 8, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 9, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 10, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 11, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 12, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 13, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 14, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 15, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		['tenista_id' => 16, 'torneio_id' => 1, 'chaveamento_id' => 1, 'pago' => 1, 'status' => 'Confirmada', 'prazodepagamento' => '2016-09-26', 'created_at' => Carbon::now()],
    		]);
        
    }
}
