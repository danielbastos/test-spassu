<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAutorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return ['nome' => ['required','string','max:255']];
    }

    public function messages(): array
    {
        return (new StoreAutorRequest)->messages();
    }

    protected function prepareForValidation(): void
    {
        $this->merge(['nome' => $this->nome ? trim($this->nome) : null]);
    }
}
