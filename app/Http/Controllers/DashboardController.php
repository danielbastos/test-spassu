<?php

namespace App\Http\Controllers;

use App\Models\{Livro, Autor, Assunto};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagens totais
        $totais = [
            'livros'   => Livro::count(),
            'autores'  => Autor::count(),
            'assuntos' => Assunto::count(),
        ];

        // Últimos criados (opcional)
        $recentes = [
            'livros'   => Livro::latest()->take(5)->get(['cod_l','titulo','created_at']),
            'autores'  => Autor::latest()->take(5)->get(['cod_au','nome','created_at']),
            'assuntos' => Assunto::latest()->take(5)->get(['cod_as','descricao','created_at']),
        ];

        // Tendência últimos 7 dias (se tiver created_at)
        $inicio = Carbon::now()->subDays(6)->startOfDay();
        $fim    = Carbon::now()->endOfDay();

        $serie = [
            'livros'   => $this->serieDiaria(Livro::query(), $inicio, $fim),
            'autores'  => $this->serieDiaria(Autor::query(), $inicio, $fim),
            'assuntos' => $this->serieDiaria(Assunto::query(), $inicio, $fim),
        ];

        return view('dashboard.index', compact('totais','recentes','serie','inicio','fim'));
    }

    private function serieDiaria($query, Carbon $inicio, Carbon $fim): array
    {
        $rows = $query->whereBetween('created_at', [$inicio, $fim])
            ->select(DB::raw("DATE(created_at) as d"), DB::raw("COUNT(*) as c"))
            ->groupBy('d')
            ->orderBy('d')
            ->pluck('c','d')
            ->all();

        // Preenche dias vazios com zero
        $out = [];
        for ($d = $inicio->copy(); $d->lte($fim); $d->addDay()) {
            $key = $d->toDateString();
            $out[$key] = $rows[$key] ?? 0;
        }
        return $out;
    }
}
