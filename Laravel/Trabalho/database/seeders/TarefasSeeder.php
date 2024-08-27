<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TarefasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarefas')->insert([
            'name' => 'Criar Planilhas',
            'description' => 'Criar uma planilha de gastos',
            'date' => '2024-09-24',
        ]);
    }
}
