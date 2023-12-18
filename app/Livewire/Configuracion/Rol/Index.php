<?php

namespace App\Livewire\Configuracion\Rol;

use App\Models\Permiso;
use App\Models\Rol;
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
    public $titulo_modal = 'Crear Rol';
    public $modo_modal = 'create';
    public $rol_id;

    // variables para el formulario
    #[Validate('required|unique:rol,nombre')]
    public $nombre;
    #[Validate('boolean')]
    public $estado = true;
    #[Validate('nullable|array')]
    public $permiso = [];
    public $select_all = false;

    public function modo() {
        $this->limpiar_modal();
        $this->modo_modal = 'create';
        $this->titulo_modal = 'Crear Rol';
    }

    public function limpiar_modal() {
        $this->reset([
            'titulo_modal',
            'modo_modal',
            'rol_id',
            'nombre',
            'estado',
            'permiso',
            'select_all',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedSelectAll($value) {
        if ($value) {
            $this->permiso = Permiso::where('estado', 1)
                ->orderBy('nombre')
                ->pluck('id')
                ->toArray();
        } else {
            $this->permiso = [];
        }
    }

    public function editar($rol_id) {
        $this->limpiar_modal();
        $this->modo_modal = 'edit';
        $this->titulo_modal = 'Editar Rol';
        $rol = Rol::find($rol_id);
        $this->rol_id = $rol->id;
        $this->nombre = $rol->nombre;
        $this->estado = $rol->estado == 1 ? true : false;
        $this->permiso = $rol->permisos->pluck('id')->toArray();
    }

    public function guardar() {
        // validamos los datos
        if ($this->modo_modal == 'create') {
            $this->validate([
                'nombre' => 'required|unique:rol,nombre',
                'estado' => 'boolean',
                'permiso' => 'nullable|array'
            ]);
        } else {
            $this->validate([
                'nombre' => 'required|unique:rol,nombre,' . $this->rol_id . ',id',
                'estado' => 'boolean',
                'permiso' => 'nullable|array'
            ]);
        }
        // guardamos los datos
        if ($this->modo_modal == 'create') {
            $rol = new Rol();
            $rol->nombre = $this->nombre;
            $rol->estado = $this->estado;
            $rol->save();
            // sincronizamos los permisos
            $rol->permisos()->sync($this->permiso);
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Exito',
                mensaje: 'Rol creado correctamente.',
            );
        } else {
            $rol = Rol::find($this->rol_id);
            $rol->nombre = $this->nombre;
            $rol->estado = $this->estado;
            $rol->save();
            // sincronizamos los permisos
            $rol->permisos()->sync($this->permiso);
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Exito',
                mensaje: 'Rol actualizado correctamente.',
            );
        }
        // cerrar modal
        $this->dispatch('modal',
            modal: '#modal-rol',
            action: 'hide'
        );
        // limpiar formulario
        $this->limpiar_modal();
    }

    public function delete($rol_id) {
        // verificamos si el rol tiene usuarios asignados
        $rol = Rol::find($rol_id);
        if ($rol->usuarios->count() > 0) {
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'error',
                titulo: 'Error',
                mensaje: 'No se puede eliminar el rol porque tiene usuarios asignados.',
            );
        } else {
            // eliminamos el rol
            $rol->delete();
            // Mostramos mensaje en toast
            $this->dispatch('toast',
                tipo: 'success',
                titulo: 'Exito',
                mensaje: 'Rol eliminado correctamente.',
            );
        }
    }

    public function render() {
        $roles = Rol::search($this->search)
            ->orderBy('id', 'desc')
            ->paginate($this->paginate);
        $permisos = Permiso::where('estado', 1)
            ->orderBy('nombre')
            ->get();
        return view('livewire.configuracion.rol.index', [
            'roles' => $roles,
            'permisos' => $permisos,
        ]);
    }
}
