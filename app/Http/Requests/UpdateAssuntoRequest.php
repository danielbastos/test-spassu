<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssuntoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'descricao' => ['required','string','max:255'],
        ];
    }

    public function messages(): array
    {
        return (new StoreAssuntoRequest)->messages();
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['descricao' => $this->descricao ? trim($this->descricao) : null]);
    }
}
