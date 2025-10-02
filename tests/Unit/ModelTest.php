<?php

namespace Tests\Unit;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use App\Models\LivroAutor;
use App\Models\LivroAssunto;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function test_livro_model_fillable()
    {
        $livro = new Livro([
            'titulo' => 'Livro Teste',
            'editora' => 'Editora Teste',
            'edicao' => 1,
            'ano' => 2025,
        ]);
        $this->assertEquals('Livro Teste', $livro->titulo);
        $this->assertEquals('Editora Teste', $livro->editora);
        $this->assertEquals(1, $livro->edicao);
        $this->assertEquals(2025, $livro->ano);
    }

    public function test_autor_model_fillable()
    {
        $autor = new Autor(['nome' => 'Autor Teste']);
        $this->assertEquals('Autor Teste', $autor->nome);
    }

    public function test_assunto_model_fillable()
    {
        $assunto = new Assunto(['descricao' => 'Assunto Teste']);
        $this->assertEquals('Assunto Teste', $assunto->descricao);
    }

    public function test_livro_autor_model_fillable()
    {
        $livroAutor = new LivroAutor([
            'livro_cod_l' => 1,
            'autor_cod_au' => 2,
        ]);
        $this->assertEquals(1, $livroAutor->livro_cod_l);
        $this->assertEquals(2, $livroAutor->autor_cod_au);
    }

    public function test_livro_assunto_model_fillable()
    {
        $livroAssunto = new LivroAssunto([
            'livro_cod_l' => 1,
            'assunto_cod_as' => 3,
        ]);
        $this->assertEquals(1, $livroAssunto->livro_cod_l);
        $this->assertEquals(3, $livroAssunto->assunto_cod_as);
    }
}
