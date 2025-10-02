<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAutorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max'      => 'O nome pode ter no máximo :max caracteres.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'nome' => $this->nome ? trim($this->nome) : null,
        ]);
    }
}
