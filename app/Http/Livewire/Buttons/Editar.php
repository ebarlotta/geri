<?php

namespace App\Http\Livewire\Buttons;

use Livewire\Component;

class Editar extends Component
{
    public $control;

    public function mount($control)
    {
        $this->control = $control;
    }
    public function render()
    {
        return view('livewire.buttons.editar');
    }
}
