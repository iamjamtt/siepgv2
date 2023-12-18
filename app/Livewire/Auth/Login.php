<?php

namespace App\Livewire\Auth;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
#[Title('Login - Siepg')]
class Login extends Component {
    #[Validate('required|email')]
    public $correo_electronico;
    #[Validate('required')]
    public $contraseña;

    public function ingresar() {
        // Validar los datos
        $this->validate();
        // Buscar el usuario
        $usuario = Usuario::where('email', $this->correo_electronico)->first();
        // Verificar si existe
        if (!$usuario) {
            // Mostrar error
            $this->addError('correo_electronico', 'Credenciales incorrectas');
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'error',
                titulo: 'Error',
                mensaje: 'Credenciales incorrectas.',
            );
            return;
        }
        // Verificar si la contraseña es correcta
        if (Hash::check($this->contraseña, $usuario->password)) {
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Éxito',
                mensaje: 'Bienvenido.',
            );
            // Iniciar sesión
            auth()->login($usuario);
            // Redireccionar
            return redirect()->route('home.index');
        } else {
            // Mostrar error
            $this->addError('correo_electronico', 'Credenciales incorrectas');
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'error',
                titulo: 'Error',
                mensaje: 'Credenciales incorrectas.',
            );
            return;
        }
    }

    public function render() {
        return view('livewire.auth.login');
    }
}
