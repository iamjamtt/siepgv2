<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar py-3">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h2 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Permisos
                </h2>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    {{-- <li class="breadcrumb-item text-muted">
                        <a href="index.html" class="text-muted text-hover-primary">
                            Dashboard
                        </a>
                    </li> --}}
                    <li class="breadcrumb-item text-muted">
                        Configuración
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        Permisos
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row mb-5 mb-xl-10">
                <div class="col-md-12 mb-md-5 mb-xl-10">
                    <div
                        class="alert bg-light-primary border border-3 border-primary d-flex align-items-center p-5 mb-5">
                        <i class="ki-outline ki-information-5 fs-2qx me-4 text-primary"></i>
                        <div class="d-flex flex-column">
                            <span class="fw-bold fs-5">
                                Acontinuación se muestra la lista de permisos que tiene el sistema.
                            </span>
                        </div>
                    </div>
                    <div class="card card-flush">
                        <div class="card-header mt-6">
                            <div class="card-title flex-column flex-md-row gap-4 align-items-center w-full">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-gray-700 fs-6">Mostrar</span>
                                    <select class="form-select" wire:model.live="paginate">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center position-relative me-5">
                                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                    <input type="text" wire:model.live.debounce.500="search"
                                        class="form-control w-md-300px ps-13" placeholder="Buscar..." />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                                    wire:click="modo" data-bs-target="#modal-permiso">
                                    <i class="ki-outline ki-plus-square fs-3"></i>
                                    Nuevo Permiso
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                        <tr class="text-start text-gray-600 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-10px">
                                                Nro
                                            </th>
                                            <th class="min-w-250px">
                                                Permiso
                                            </th>
                                            <th class="min-w-125px">
                                                F. Creación
                                            </th>
                                            <th class="min-w-125px">
                                                Estado
                                            </th>
                                            <th class="text-end min-w-100px"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-800">
                                        @forelse ($permisos as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->id }}
                                                </td>
                                                <td>
                                                    {{ $item->nombre }}
                                                </td>
                                                <td>
                                                    {{ formatFechaHora($item->created_at) }}
                                                </td>
                                                <td>
                                                    @if ($item->estado == 1)
                                                        <span
                                                            class="badge badge-light-success py-2 px-3 fs-7">Activo</span>
                                                    @else
                                                        <span
                                                            class="badge badge-light-danger py-2 px-3 fs-7">Inactivo</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <button
                                                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                        wire:click="editar({{ $item->id }})" data-bs-toggle="modal"
                                                        data-bs-target="#modal-permiso">
                                                        <i class="ki-outline ki-setting-3 fs-2"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                                        wire:click="delete({{ $item->id }})">
                                                        <i class="ki-outline ki-trash fs-2"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center py-20">
                                                    <span class="text-gray-600 fw-bold">No hay registros</span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- paginacion --}}
                    @if ($permisos->hasPages())
                        <div class="d-flex justify-content-between mt-5">
                            <div class="d-flex align-items-center text-gray-700">
                                Mostrando {{ $permisos->firstItem() }} - {{ $permisos->lastItem() }} de
                                {{ $permisos->total() }}
                                registros
                            </div>
                            <div>
                                {{ $permisos->links() }}
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-between mt-5">
                            <div class="d-flex align-items-center text-gray-700">
                                Mostrando {{ $permisos->firstItem() }} - {{ $permisos->lastItem() }} de
                                {{ $permisos->total() }}
                                registros
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="modal-permiso" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        {{ $titulo_modal }}
                    </h3>
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" wire:click="limpiar_modal"
                        data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <form autocomplete="off" wire:submit.prevent="guardar">
                    <div class="modal-body row g-5"">
                        <div class=" col-md-12">
                            <label for="nombre" class="required form-label">
                                Nombre
                            </label>
                            <input type="text" wire:model="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                placeholder="Ingrese el nombre del permiso" id="nombre" />
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="estado" class="form-label">
                                Estado
                            </label>
                            <div class="form-check form-switch form-check-custom">
                                <input class="form-check-input" type="checkbox" id="estado"
                                    wire:model="estado" />
                                <label class=" form-check-label" for="estado">
                                    Activo
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                            wire:click="limpiar_modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary" style="width: 150px"
                            wire:loading.attr="disabled" wire:target="guardar">
                            <div wire:loading.remove wire:target="guardar">
                                Guardar
                            </div>
                            <div wire:loading wire:target="guardar">
                                Procesando <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
