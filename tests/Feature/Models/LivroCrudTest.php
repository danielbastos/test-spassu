<?php


namespace Tests\Feature\Models;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LivroCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_livro()
    {
        $livro = Livro::create([
            'titulo' => 'Computação',
            'editora' => 'Tech',
            'edicao' => '1',
            'ano' => 2025,
        ]);

        $this->assertTrue($livro->exists);
        $this->assertEquals('Computação', $livro->titulo);
    }
}
