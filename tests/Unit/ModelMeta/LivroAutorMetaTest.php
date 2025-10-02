<?php


use PHPUnit\Framework\TestCase;
use App\Models\LivroAutor;

class LivroAutorMetaTest extends TestCase
{
    public function test_metadata()
    {
        $m = new LivroAutor;
        $this->assertEquals('livro_autor', $m->getTable());
        $this->assertFalse($m->getIncrementing());
        $this->assertEquals(['livro_cod_l','autor_cod_au'], $m->getFillable());
    }
}
