<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\Assunto;

class AssuntoSelect extends Component
{
    public ?int $selected;
    public string $name;
    public bool $required;
    public string $label;

    public function __construct(string $name = 'assunto_id', ?int $selected = null, bool $required = false, string $label = 'Assunto')
    {
        $this->name = $name;
        $this->selected = $selected;
        $this->required = $required;
        $this->label = $label;
    }

    public function render(): \Illuminate\Contracts\View\View|Closure|string
    {
        $assuntos = Assunto::orderBy('descricao')->get();

        return view('components.assunto-select', compact('assuntos'));
    }
}
