<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    protected $table = 'assunto';
    protected $primaryKey = 'cod_as';

    protected $fillable = [
        'descricao',
    ];

    public function livros() {
        return $this->belongsToMany(
            Livro::class, 'livro_assunto', 'assunto_cod_as', 'livro_cod_l'
        );
    }
}
