<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;

class AutorController extends Controller
{
    public function index()
    {
        $q = trim(request('q', ''));
        $autores = Autor::when($q, function ($w) use ($q) {
            if (filter_var($q, FILTER_VALIDATE_INT) !== false) $w->where('cod_au', '=', $q);
            else $w->where('nome','ilike',"%{$q}%");
            return $w;
        })->orderByDesc('cod_au')->paginate(10)->withQueryString();

        return view('autores.index', compact('autores', 'q'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(StoreAutorRequest $request)
    {
        $autor = Autor::create($request->validated());

        return redirect()->route('autores.index')
            ->with('ok', "Autor '{$autor->nome}' criado com sucesso!");
    }

    public function show(Autor $autor)
    {
        return view('autores.show', compact('autor'));
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(UpdateAutorRequest $request, Autor $autor)
    {
        $autor->update($request->validated());

        return redirect()->route('autores.show', $autor)
            ->with('ok', "Autor atualizado com sucesso!");
    }

    public function destroy(Autor $autor)
    {
        $nome = $autor->nome;
        $autor->delete();

        return redirect()->route('autores.index')
            ->with('ok', "Autor '{$nome}' excluído!");
    }
}
