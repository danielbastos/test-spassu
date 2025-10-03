<?php

namespace Tests\Feature\Models;

use App\Models\Autor;
use App\Models\Assunto;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RelationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_vincula_autores_e_assuntos_a_um_livro_com_attach()
    {
        $livro = Livro::create([
            'titulo'  => 'Livro Z',
            'editora' => 'Edit',
            'edicao'  => 1,
            'ano'     => 2025,
            'preco'   => 50.00,
        ]);
        $autor = Autor::create(['nome' => 'Autor Y']);
        $assunto = Assunto::create(['descricao' => 'Estruturas']);

        $livro->autores()->attach($autor->getKey());      // usa livro_autor
        $livro->assuntos()->attach($assunto->getKey());   // usa livro_assunto

        $this->assertEquals(1, $livro->autores()->count());
        $this->assertEquals(1, $livro->assuntos()->count());
    }
}
