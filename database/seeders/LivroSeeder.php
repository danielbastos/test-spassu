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
                'ano'     => 2020,
                'preco'   => 99.90,
            ],
            [
                'titulo'  => 'Banco de Dados Moderno',
                'editora' => 'DataPress',
                'edicao'  => '2',
                'ano'     => 2022,
                'preco'   => 120.00,
            ],
            [
                'titulo'  => 'Engenharia de Software Prática',
                'editora' => 'SoftPub',
                'edicao'  => '3',
                'ano'     => 2024,
                'preco'   => 150.50,
            ],
            [
                'titulo'  => 'Redes de Computadores Avançadas',
                'editora' => 'NetEdit',
                'edicao'  => '1',
                'ano'     => 2021,
                'preco'   => 110.75,
            ],
            [
                'titulo'  => 'Estruturas de Dados em Profundidade',
                'editora' => 'AlgoBooks',
                'edicao'  => '2',
                'ano'     => 2023,
                'preco'   => 89.99,
            ],
            [
                'titulo'  => 'Inteligência Artificial: Fundamentos',
                'editora' => 'AIBooks',
                'edicao'  => '1',
                'ano'     => 2025,
                'preco'   => 200.00,
            ],
        ];

        foreach ($livros as $l) {
            Livro::create($l);
        }
    }
}
