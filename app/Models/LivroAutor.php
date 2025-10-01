<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAutor extends Model
{
    use HasFactory;

    protected $table = 'livro_autor';
    public $incrementing = false;
    protected $primaryKey = ['livro_cod_l', 'autor_cod_au'];

    protected $fillable = [
        'livro_cod_l',
        'autor_cod_au',
    ];
}
