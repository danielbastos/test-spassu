<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\Autor;

class AutorSelect extends Component
{
    public ?int $selected;
    public string $name;
    public bool $required;
    public string $label;

    public function __construct(string $name = 'autor_cod_au', ?int $selected = null, bool $required = false, string $label = 'Autor')
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->required = $required;
        $this->label = $label;
    }

    public function render(): \Illuminate\Contracts\View\View|Closure|string
    {
        $autores = Autor::orderBy('nome')->get();
        return view('components.autor-select', compact('autores'));
    }
}
