<?php

use Illuminate\Database\Seeder;

class PermissaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('permissaos')->insert([
            ['nome' => "Func",
            "descricao" => "Permissao para alterar ou cadastrar funcionarios"
            ],
            ['nome' => "Academia",
            "descricao" => "Permissao para alterar ou cadastrar academias"
            ],
            ['nome' => "Classe",
            "descricao" => "Permissao cadastrar classes"
            ]
            ]);

        DB::table('papel_permissao')->insert([
            ['permissao_id' => "1",
            "papel_id" => "2"
            ],
            ['permissao_id' => "2",
            "papel_id" => "2"
            ],
             ['permissao_id' => "3",
            "papel_id" => "2"
            ]
            ]);
    }
}
