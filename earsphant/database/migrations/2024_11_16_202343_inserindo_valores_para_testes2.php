<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        DB::table('servico')->insert([
            [
                'servico' => 'Programas',
                'status' => 'ativo',
                'codigo' => '1',
                'ans' => null,
            ],
            [
                'servico' => 'Permissões',
                'status' => 'user',
                'codigo' => '2',
                'ans' => null,
            ],
            [
                'servico' => 'Internet',
                'status' => 'ativo',
                'codigo' => '3',
                'ans' => null,
            ],
            ]);

        DB::table('atendimentos')->insert([
        [
            'setor' => '003',
            'usuario' => 'user',
            'codigo' => '1',
            'servico' => '1',
            'subservico' => 'Instalação',
            'status' => 'Finalizado',
            'fila' => 'Resolvidas',
            'descricao' => 'Instalar libreoffice em todas as estações do setor',
            'abertura' => '2024-11-16 10:30:45',
            'fechamento' => '2024-11-16 17:30:00',
            'ans' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'setor' => '001',
            'usuario' => 'tec',
            'codigo' => '2',
            'servico' => '2',
            'subservico' => 'Usuário',
            'status' => 'Em atendimento',
            'fila' => 'Suporte',
            'descricao' => 'Criar a novo usuário login l34567, setor administração, nome José Carlos',
            'abertura' => '2024-11-16 10:40:45',
            'fechamento' => null,
            'ans' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'setor' => '003',
            'usuario' => 'user',
            'codigo' => '3',
            'servico' => '3',
            'subservico' => 'Rede',
            'status' => 'Aberto',
            'fila' => 'Abertas',
            'descricao' => 'A internet parou de funcionar em todo o setor',
            'abertura' => '2024-11-16 10:45:45',
            'fechamento' => null,
            'ans' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
