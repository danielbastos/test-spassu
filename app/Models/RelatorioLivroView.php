<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelatorioLivroView extends Model
{
    protected $table = 'vw_rel_livros';
    protected $primaryKey = 'livro_id';
    public $incrementing = false;
    public $timestamps = false;

    // Campos pesquisáveis
    protected $fillable = []; // só leitura
}
