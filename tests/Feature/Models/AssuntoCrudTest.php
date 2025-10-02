<?php


namespace Tests\Models;

use App\Models\Assunto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssuntoCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_crud()
    {
        $assunto = Assunto::create(['descricao' => 'Romançe']);

        $this->assertTrue($assunto->exists);
        $this->assertEquals('Romançe', $assunto->descricao);

        $assunto->update(['descricao' => 'Fantasia']);
        $this->assertEquals('Fantasia', $assunto->fresh()->descricao);

        $id = $assunto->getKey();
        $assunto->delete();

        $this->assertNull(Assunto::find($id));
    }
}
