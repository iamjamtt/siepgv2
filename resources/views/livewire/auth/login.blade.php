<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <div class="w-lg-500px p-10">
            <form class="form w-100" novalidate="novalidate" wire:submit.prevent="ingresar">
                <div class="text-center mb-11">
                    <h1 class="text-gray-900 fw-bolder mb-3">
                        Ingresa a tu cuenta
                    </h1>
                    <div class="text-gray-500 fw-semibold fs-6">
                        Sistema Integrado de Escuela de Posgrado
                    </div>
                </div>

                <div class="mb-8">
                    <label for="correo_electronico" class="required form-label">
                        Correo electrónico
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="ki-outline ki-sms fs-1"></i>
                        </span>
                        <input type="email" class="form-control @error('correo_electronico') is-invalid @enderror"
                            placeholder="Ingrese su correo electrónico" wire:model.live="correo_electronico"
                            id="correo_electronico" />
                        @error('correo_electronico')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-8">
                    <label for="contraseña" class="required form-label">
                        Contraseña
                    </label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="ki-outline ki-lock-3 fs-1"></i>
                        </span>
                        <input type="password" class="form-control @error('contraseña') is-invalid @enderror"
                            placeholder="Ingrese su contraseña" wire:model.live="contraseña" id="contraseña" />
                        @error('contraseña')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">
                            Ingresar
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
