<?php


namespace Tests\Feature\Models;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutorCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_autor()
    {
        $autor = Autor::create(['nome' => 'Ada Lovelace']);
        $this->assertTrue($autor->exists);
    }
}
