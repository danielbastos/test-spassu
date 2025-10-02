<?php


use PHPUnit\Framework\TestCase;
use App\Models\Autor;

class AutorMetaTest extends TestCase
{
    public function test_metadata()
    {
        $m = new Autor;
        $this->assertEquals('autor', $m->getTable());
        $this->assertEquals('cod_au', $m->getKeyName());
        $this->assertEquals(['nome'], $m->getFillable());
    }
}
