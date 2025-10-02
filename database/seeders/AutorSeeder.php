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
        ];

        foreach ($autores as $a) {
            Autor::create($a);
        }
    }
}
