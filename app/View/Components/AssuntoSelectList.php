<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Assunto;

class AssuntoSelectList extends Component
{
    public ?array $selected;
    public string $name;
    public string $label;

    public function __construct(string $name = 'assuntos', ?array $selected = null, string $label = 'Assuntos')
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->label = $label;
    }

    public function render()
    {
        $assuntos = Assunto::orderBy('descricao')->get();
        return view('components.assunto-select-list', compact('assuntos'));
    }
}
