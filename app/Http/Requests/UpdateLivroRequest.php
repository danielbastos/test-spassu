<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Livro;

class UpdateLivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $routeParam = $this->route('livro');
        $model      = $routeParam instanceof Livro ? $routeParam : Livro::find($routeParam);
        $id         = $model?->getKey();
        $idColumn   = (new Livro)->getKeyName();
        return [
            'titulo'  => ['required', 'string', 'max:255', Rule::unique('livro', 'titulo')
                ->ignore($id, $idColumn)
                ->where(fn($q) => $q
                    ->where('editora', $this->editora)
                    ->where('edicao',  $this->edicao)
                    ->where('ano',     $this->ano)
            )],
            'editora' => ['nullable', 'string', 'max:255'],
            'edicao'  => ['nullable', 'string', 'max:50'],
            'ano'     => ['nullable', 'integer', 'max:' . (date('Y'))],
            'autores' => ['array'],
            'autores.*' => ['integer', 'exists:autor,cod_au'],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O título é obrigatório.',
            'titulo.unique'   => 'Já existe um livro com esse conjunto: título, editora, edição e ano.',
            'titulo.max'      => 'O título pode ter no máximo :max caracteres.',
            'ano.integer'     => 'O ano deve ser um número.',
            'ano.max'         => 'O ano deve ser menor ou igual a :max.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'titulo'  => $this->titulo ? trim($this->titulo) : null,
            'editora' => $this->editora ? trim($this->editora) : null,
            'edicao'  => $this->edicao ? trim($this->edicao) : null,
            'ano'     => $this->ano !== null && $this->ano !== '' ? (int) $this->ano : null,
        ]);
    }
}
