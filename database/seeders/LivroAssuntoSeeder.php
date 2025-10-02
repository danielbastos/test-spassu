<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Livro, Assunto, LivroAssunto};

class LivroAssuntoSeeder extends Seeder
{
    public function run(): void
    {
        $livros = Livro::all();
        $assuntos = Assunto::all();

        foreach ($livros as $livro) {
            LivroAssunto::create([
                'livro_cod_l'   => $livro->cod_l,
                'assunto_cod_as' => $assuntos->random()->cod_as,
            ]);
        }
    }
}
