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
    #[Url('paginar')]
    public $paginate = 10;

    // variables para el modal
    public $titulo_modal = 'Crear Permiso';
    public $modo_modal = 'create';
    public $permiso_id;

    // variables para el formulario
    #[Validate('required|unique:permiso,nombre')]
    public $nombre;
    #[Validate('boolean')]
    public $estado = true;

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
            'estado',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function editar($permiso_id) {
        $this->limpiar_modal();
        $this->modo_modal = 'edit';
        $this->titulo_modal = 'Editar Permiso';
        $permiso = Permiso::find($permiso_id);
        $this->permiso_id = $permiso->id;
        $this->nombre = $permiso->nombre;
        $this->estado = $permiso->estado == 1 ? true : false;
    }

    public function guardar() {
        // validamos los datos
        if ($this->modo_modal == 'create') {
            $this->validate([
                'nombre' => 'required|unique:permiso,nombre',
                'estado' => 'boolean'
            ]);
        } else {
            $this->validate([
                'nombre' => 'required|unique:permiso,nombre,' . $this->permiso_id . ',id',
                'estado' => 'boolean'
            ]);
        }
        // guardamos los datos
        if ($this->modo_modal == 'create') {
            $permiso = new Permiso();
            $permiso->nombre = $this->nombre;
            $permiso->estado = $this->estado;
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
            $permiso->estado = $this->estado;
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
        // limpiar formulario
        $this->limpiar_modal();
    }

    public function delete($permiso_id) {
        // verificamos si el permiso tiene roles asignados
        $permiso = Permiso::find($permiso_id);
        if ($permiso->roles->count() > 0) {
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'error',
                titulo: 'Error',
                mensaje: 'El permiso no se puede eliminar porque tiene roles asignados.',
            );
        } else {
            // eliminamos el permiso
            $permiso->delete();
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Exito',
                mensaje: 'Permiso eliminado correctamente.',
            );
        }
    }

    public function render() {
        $permisos = Permiso::search($this->search)
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginate ?? 10);
        return view('livewire.configuracion.permiso.index', [
            'permisos' => $permisos,
        ]);
    }
}
