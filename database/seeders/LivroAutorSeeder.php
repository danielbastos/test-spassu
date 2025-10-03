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

        foreach ($autores as $autor) {
            try {
                LivroAutor::create([
                    'livro_cod_l' => $livros->random()->cod_l,
                    'autor_cod_au' => $autor->cod_au,
                ]);
            } catch (\Throwable $th) {
                // ignorar erros de chave na geração de massa de dados
            }
        }
    }
}
