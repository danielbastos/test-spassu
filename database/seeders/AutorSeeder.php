<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    public function run(): void
    {
        $autores = [
            ['nome' => 'Ada Lovelace'],
            ['nome' => 'Alan Turing'],
            ['nome' => 'Donald Knuth'],
            ['nome' => 'Grace Hopper'],
            ['nome' => 'Linus Torvalds'],
            ['nome' => 'Tim Berners-Lee'],
            ['nome' => 'Margaret Hamilton'],
            ['nome' => 'Barbara Liskov'],
        ];

        foreach ($autores as $a) {
            Autor::create($a);
        }
    }
}
