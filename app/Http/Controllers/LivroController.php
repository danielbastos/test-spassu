<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;

class LivroController extends Controller
{
    /**
     * Lista todos os livros.
     */
    public function index()
    {
        $q = request('q');
        $livros = Livro::when($q, function ($w) use ($q) {
            if (filter_var($q, FILTER_VALIDATE_INT) !== false)
                $w->where('ano', '=', $q)->orWhere('cod_l', '=', $q);
            else
                $w->where('titulo', 'ilike', "%{$q}%")->orWhere('editora', 'ilike', "%{$q}%");
            return $w;
        })->orderByDesc('cod_l')->paginate(10)->withQueryString();

        return view('livros.index', compact('livros','q'));
    }

    /**
     * Mostra formulário de criação.
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * Salva novo livro.
     */
    public function store(StoreLivroRequest $request)
    {
        $livro = Livro::create($request->validated());
        $livro->assuntos()->sync($request->input('assuntos', []));
        $livro->autores()->sync($request->input('autores', []));

        return redirect()
            ->route('livros.index')
            ->with('ok', "Livro '{$livro->titulo}' criado com sucesso!");
    }

    /**
     * Exibe detalhes do livro.
     */
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    /**
     * Mostra formulário de edição.
     */
    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    /**
     * Atualiza o livro.
     */
    public function update(UpdateLivroRequest $request, Livro $livro)
    {
        $livro->update($request->validated());
        $livro->assuntos()->sync($request->input('assuntos', []));
        $livro->autores()->sync($request->input('autores', []));

        return redirect()
            ->route('livros.show', $livro)
            ->with('ok', "Livro '{$livro->titulo}' atualizado com sucesso!");
    }

    /**
     * Exclui o livro.
     */
    public function destroy(Livro $livro)
    {
        $titulo = $livro->titulo;
        $livro->delete();

        return redirect()
            ->route('livros.index')
            ->with('ok', "Livro '{$titulo}' excluído com sucesso!");
    }
}
