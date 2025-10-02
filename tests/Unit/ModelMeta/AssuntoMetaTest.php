<?php


use PHPUnit\Framework\TestCase;
use App\Models\Assunto;

class AssuntoMetaTest extends TestCase
{
    public function test_metadata()
    {
        $m = new Assunto;
        $this->assertEquals('assunto', $m->getTable());
        $this->assertEquals('cod_as', $m->getKeyName());
        $this->assertEquals(['descricao'], $m->getFillable());
    }
}
