<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAssunto extends Model
{
    use HasFactory;

    protected $table = 'livro_assunto';
    public $incrementing = false;
    protected $primaryKey = ['livro_cod_l', 'assunto_cod_as'];

    protected $fillable = [
        'livro_cod_l',
        'assunto_cod_as',
    ];
}
