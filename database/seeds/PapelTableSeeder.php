<?php

use Illuminate\Database\Seeder;

class PapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
     {
       DB::table('papels')->insert([
         [   'nome' => "admin",
            'descricao' => "O administrador será responsavel por dar a manutenção no site",
            
        ],
        [
            'nome' => "Gerente",
            'descricao' => "O Gerente será responsavel pelo controle de torneios e funcionarios",
            
        ],
        [
            'nome' => "Funcionario",
            'descricao' => "O Fucionario será responsavel por noticias e atualização de torneios",
            
        ],
        [
            'nome' => "Definida",
            'descricao' => "Esta Função será para definir quais permissões especificas o usuario terá",
            
        ],
        ]);
       
       DB::table('papel_user')->insert(
            ['papel_id' => "1",
            "user_id" => "1"
            ]);


    }
}
