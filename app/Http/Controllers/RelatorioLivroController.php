<?php

namespace App\Http\Controllers;

use App\Models\RelatorioLivroView;
use Illuminate\Http\Request;
use App\Models\Livro;

class RelatorioLivroController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->input('q', ''));

        $rows = RelatorioLivroView::query()
            ->when($q !== '', function ($qry) use ($q) {
                $qry->where(function ($w) use ($q) {
                    $w->where('titulo', 'ilike', "%{$q}%")
                      ->orWhere('editora', 'ilike', "%{$q}%")
                      ->orWhere('edicao', 'ilike', "%{$q}%")
                      ->orWhere('ano', 'ilike', "%{$q}%")
                      ->orWhere('autores_str', 'ilike', "%{$q}%")
                      ->orWhere('assuntos_str', 'ilike', "%{$q}%");
                });
            })
            ->orderBy('titulo')
            ->paginate(15)
            ->withQueryString();

        return view('relatorios.livros_view', [
            'rows' => $rows,
            'q'    => $q,
        ]);
    }
}
