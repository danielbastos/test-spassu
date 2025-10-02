<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autor';
    protected $primaryKey = 'cod_au';

    protected $fillable = [
        'nome',
    ];

    public function livros() {
        return $this->belongsToMany(
            Livro::class, 'livro_autor', 'autor_cod_au', 'livro_cod_l'
        );
    }

}
