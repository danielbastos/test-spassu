<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Livro, Autor, LivroAutor};

class LivroAutorSeeder extends Seeder
{
    public function run(): void
    {
        $livros = Livro::all();
        $autores = Autor::all();

        foreach ($livros as $livro) {
            LivroAutor::create([
                'livro_cod_l' => $livro->cod_l,
                'autor_cod_au' => $autores->random()->cod_au,
            ]);
        }
    }
}
