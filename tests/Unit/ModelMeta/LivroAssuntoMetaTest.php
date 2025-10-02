<?php


use PHPUnit\Framework\TestCase;
use App\Models\LivroAssunto;

class LivroAssuntoMetaTest extends TestCase
{
    public function test_metadata()
    {
        $m = new LivroAssunto;
        $this->assertEquals('livro_assunto', $m->getTable());
        $this->assertFalse($m->getIncrementing());
        $this->assertEquals(['livro_cod_l','assunto_cod_as'], $m->getFillable());
    }
}
