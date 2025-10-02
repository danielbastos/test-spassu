<?php
namespace App\Http\Controllers;

use App\Models\Assunto;
use App\Http\Requests\StoreAssuntoRequest;
use App\Http\Requests\UpdateAssuntoRequest;

class AssuntoController extends Controller
{
    public function index()
    {
        $q = request('q');
        $assuntos = Assunto::when($q, function ($w) use ($q) {
            if (filter_var($q, FILTER_VALIDATE_INT) !== false) $w->where('cod_as', '=', $q);
            else $w->where('descricao','ilike',"%{$q}%");
            return $w;
        })->orderByDesc('cod_as')->paginate(10)->withQueryString();

        return view('assuntos.index', compact('assuntos','q'));
    }

    public function create() { return view('assuntos.create'); }

    public function store(StoreAssuntoRequest $request)
    {
        Assunto::create($request->validated());
        return redirect()->route('assuntos.index')->with('ok','Assunto criado!');
    }

    public function show(Assunto $assunto)
    {
        return view('assuntos.show', compact('assunto'));
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(UpdateAssuntoRequest $request, Assunto $assunto)
    {
        $assunto->update($request->validated());
        return redirect()->route('assuntos.show', $assunto)->with('ok','Assunto atualizado!');
    }

    public function destroy(Assunto $assunto)
    {
        $assunto->delete();
        return redirect()->route('assuntos.index')->with('ok','Assunto excluído!');
    }
}
