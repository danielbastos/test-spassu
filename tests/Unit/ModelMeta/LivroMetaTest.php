<?php


use PHPUnit\Framework\TestCase;
use App\Models\Livro;

class LivroMetaTest extends TestCase
{
    public function test_metadata()
    {
        $m = new Livro;
        $this->assertEquals('livro', $m->getTable());
        $this->assertEquals('cod_l', $m->getKeyName());
        $this->assertEquals(['titulo','editora','edicao','ano'], $m->getFillable());
    }
}
