<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assunto;

class AssuntoSeeder extends Seeder
{
    public function run(): void
    {
        $assuntos = [
            ['descricao' => 'Algoritmos'],
            ['descricao' => 'Banco de Dados'],
            ['descricao' => 'Engenharia'],
            ['descricao' => 'IA'],
            ['descricao' => 'Redes'],
            ['descricao' => 'Programação Web'],
            ['descricao' => 'BI'],
        ];

        foreach ($assuntos as $a) {
            Assunto::create($a);
        }
    }
}
