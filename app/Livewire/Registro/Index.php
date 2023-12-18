<?php

namespace App\Livewire\Registro;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.register')]
#[Title('Registro de inscripciones')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.registro.index');
    }
}
