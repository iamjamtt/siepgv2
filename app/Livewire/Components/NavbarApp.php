<?php

namespace App\Livewire\Components;

use Livewire\Component;

class NavbarApp extends Component {
    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function render() {
        $usuario = auth()->user();
        $persona = $usuario->persona;
        return view('livewire.components.navbar-app', [
            'usuario' => $usuario,
            'persona' => $persona
        ]);
    }
}
