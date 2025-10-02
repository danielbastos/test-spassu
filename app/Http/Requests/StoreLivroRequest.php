<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Livro;

class StoreLivroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'  => ['required', 'string', 'max:40', Rule::unique('livro', 'titulo')
                ->where(fn($q) => $q
                    ->where('editora', $this->editora)
                    ->where('edicao',  $this->edicao)
                    ->where('ano',     $this->ano)
            )],
            'editora' => ['string', 'max:40'],
            'edicao'  => ['integer', 'min:1'],
            'ano'     => ['integer', 'max:' . (date('Y'))],
            'assuntos' => ['array'],
            'assuntos.*' => ['integer', 'exists:assunto,cod_as'],
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
