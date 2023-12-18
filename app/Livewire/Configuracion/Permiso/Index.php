<?php

namespace App\Livewire\Configuracion\Permiso;

use App\Models\Permiso;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('buscar')]
    public $search = '';

    // variables para el modal
    public $titulo_modal = 'Crear Permiso';
    public $modo_modal = 'create';
    public $permiso_id;

    // variables para el formulario
    #[Validate('required|unique:permisos,nombre')]
    public $nombre;

    public function modo() {
        $this->limpiar_modal();
        $this->modo_modal = 'create';
        $this->titulo_modal = 'Crear Permiso';
    }

    public function limpiar_modal() {
        $this->reset([
            'titulo_modal',
            'modo_modal',
            'permiso_id',
            'nombre',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function guardar() {
        // validamos los datos
        if ($this->modo_modal == 'create') {
            $this->validate([
                'nombre' => 'required|unique:permiso,nombre'
            ]);
        } else {
            $this->validate([
                'nombre' => 'required|unique:permiso,nombre,' . $this->permiso_id . ',id'
            ]);
        }
        if ($this->modo_modal == 'create') {
            $permiso = new Permiso();
            $permiso->nombre = $this->nombre;
            $permiso->save();
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Exito',
                mensaje: 'Permiso creado correctamente.',
            );
        } else {
            $permiso = Permiso::find($this->permiso_id);
            $permiso->nombre = $this->nombre;
            $permiso->save();
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Exito',
                mensaje: 'Permiso actualizado correctamente.',
            );
        }
        // cerrar modal
        $this->dispatch('modal',
            modal: '#modal-permiso',
            action: 'hide'
        );
    }

    public function render() {
        $permisos = Permiso::paginate(15);
        return view('livewire.configuracion.permiso.index', [
            'permisos' => $permisos,
        ]);
    }
}
