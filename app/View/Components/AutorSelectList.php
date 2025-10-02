<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Autor;

class AutorSelectList extends Component
{
    public ?array $selected;
    public string $name;
    public string $label;

    public function __construct(string $name = 'autores', ?array $selected = null, string $label = 'Autores')
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->label = $label;
    }

    public function render()
    {
        $autores = Autor::orderBy('nome')->get();
        return view('components.autor-select-list', compact('autores'));
    }
}
