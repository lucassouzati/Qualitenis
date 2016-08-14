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
            ['nome' => "Funcionario_registrar","descricao" => "Permissao para registrar um funcionario"],
            ['nome' => "Funcionario_editar","descricao" => "Permissao para alterar funcionarios"],
            ['nome' => "Funcionario_index","descricao" => "Permissao para visualizar funcionarios"],
            ['nome' => "Funcionario_desativar","descricao" => "Permissao para desativar funcionarios"],
            ['nome' => "Academia_registrar","descricao" => "Permissao para registrar um Academia"],
            ['nome' => "Academia_editar","descricao" => "Permissao para alterar Academias"],
            ['nome' => "Academia_index","descricao" => "Permissao para visualizar Academias"],
            ['nome' => "Academia_desativar","descricao" => "Permissao para desativar Academias"],
            ['nome' => "Classe_registrar","descricao" => "Permissao para registrar um Classe"],
            ['nome' => "Classe_editar","descricao" => "Permissao para alterar Classes"],
            ['nome' => "Tenista_editar","descricao" => "Permissao para alterar Tenistas"],
            ['nome' => "Tenista_index","descricao" => "Permissao para visualizar Tenistas"],
            ['nome' => "Tenista_desativar","descricao" => "Permissao para desativar Tenistas"],
            ['nome' => "Torneio_registrar","descricao" => "Permissao para registrar um Torneio"],
            ['nome' => "Torneio_index","descricao" => "Permissao para visualizar Torneios"],
            ['nome' => "Permissao_adicionar","descricao" => "Permissao para adicionar permissao à usuarios"],
            ]);

        DB::table('papel_permissao')->insert([
            //Permissao de Gerente
            ['permissao_id' => "1",
            "papel_id" => "2"
            ],
            ['permissao_id' => "2",
            "papel_id" => "2"
            ],
             ['permissao_id' => "3",
            "papel_id" => "2"
            ],
            ['permissao_id' => "5",
            "papel_id" => "2"
            ],
            ['permissao_id' => "6",
            "papel_id" => "2"
            ],
             ['permissao_id' => "7",
            "papel_id" => "2"
            ],
            ['permissao_id' => "8",
            "papel_id" => "2"
            ],
            ['permissao_id' => "9",
            "papel_id" => "2"
            ],
             ['permissao_id' => "10",
            "papel_id" => "2"
            ],
            ['permissao_id' => "11",
            "papel_id" => "2"
            ],
            ['permissao_id' => "12",
            "papel_id" => "2"
            ],
             ['permissao_id' => "13",
            "papel_id" => "2"
            ],
            ['permissao_id' => "14",
            "papel_id" => "2"
            ],
            ['permissao_id' => "15",
            "papel_id" => "2"
            ],
             ['permissao_id' => "16",
            "papel_id" => "2"
            ],
           

            //Permissao de Funcionario
            ['permissao_id' => "11",
            "papel_id" => "3"
            ],
            ['permissao_id' => "12",
            "papel_id" => "3"
            ],
             ['permissao_id' => "13",
            "papel_id" => "3"
            ],
            ['permissao_id' => "14",
            "papel_id" => "3"
            ],
            ['permissao_id' => "15",
            "papel_id" => "3"
            ],
                       ]);
    }
}
