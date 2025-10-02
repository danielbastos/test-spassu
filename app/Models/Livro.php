<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';
    protected $primaryKey = 'cod_l';

    protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'ano',
    ];

    public function autores() {
        return $this->belongsToMany(
            Autor::class, 'livro_autor', 'livro_cod_l', 'autor_cod_au'
        );
    }

    public function assuntos() {
        return $this->belongsToMany(
            Assunto::class, 'livro_assunto', 'livro_cod_l', 'assunto_cod_as'
        );
    }
}
