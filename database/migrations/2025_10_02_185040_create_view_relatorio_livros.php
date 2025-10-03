<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(<<<SQL
                CREATE OR REPLACE VIEW vw_rel_livros AS
                select
                    l.cod_l,
                    l.titulo,
                    l.editora,
                    l.edicao,
                    l.ano,
                    l.preco,
                    coalesce(string_agg(distinct a.nome, ' | ' order by a.nome), '') as autores_str,
                    coalesce(string_agg(distinct s.descricao, ' | ' order by s.descricao), '') as assuntos_str,
                    l.created_at
                from
                    livro l
                left join livro_autor la on
                    la.livro_cod_l = l.cod_l
                left join autor a on
                    a.cod_au = la.autor_cod_au
                left join livro_assunto ls on
                    ls.livro_cod_l = l.cod_l
                left join assunto s on
                    s.cod_as = ls.assunto_cod_as
                group by
                    l.cod_l,
                    l.titulo,
                    l.editora,
                    l.edicao,
                    l.ano,
                    l.preco,
                    l.created_at
        SQL);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS vw_rel_livros');
    }
};
