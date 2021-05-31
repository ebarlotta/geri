<?php

namespace App\Http\Livewire\Buttons;

use Livewire\Component;

class Eliminar extends Component
{
    public $control;

    public function mount($control)
    {
        $this->control= $control;
    }

    public function render()
    {
        //$this->control=$control;
        //dd($this->control);
        return view('livewire.buttons.eliminar');
    }
}
