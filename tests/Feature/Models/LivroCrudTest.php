<?php

namespace Tests\Feature\Models;

use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_livro()
    {
        $livro = Livro::create([
            'titulo'  => 'Computação',
            'editora' => 'Tech',
            'edicao'  => 1,
            'ano'     => 2025,
            'preco'   => 99.90,
        ]);

        $this->assertTrue($livro->exists);
        $this->assertEquals('Computação', $livro->titulo);
        $this->assertEquals('Tech', $livro->editora);
        $this->assertEquals(1, $livro->edicao);
        $this->assertEquals(2025, $livro->ano);
        $this->assertEquals(99.90, $livro->preco);
    }
}
