<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        $livros = [
            [
                'titulo'  => 'Introdução à Computação',
                'editora' => 'TechBooks',
                'edicao'  => '1',
                'ano'     => 2020
            ],
            [
                'titulo'  => 'Banco de Dados Moderno',
                'editora' => 'DataPress',
                'edicao'  => '2',
                'ano'     => 2022
            ],
            [
                'titulo'  => 'Engenharia de Software Prática',
                'editora' => 'SoftPub',
                'edicao'  => '3',
                'ano'     => 2024
            ],
        ];

        foreach ($livros as $l) {
            Livro::create($l);
        }
    }
}
