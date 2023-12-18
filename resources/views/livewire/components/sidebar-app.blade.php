<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-8" id="kt_app_sidebar_logo">
        <img alt="Logo" src="{{ asset('assets/media/logo-largo-light.png') }}" class="h-45px theme-light-show" />
        <img alt="Logo" src="{{ asset('assets/media/logo-largo-dark.png') }}" class="h-45px theme-dark-show" />
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <div class="mb-5 px-5 d-flex flex-column gap-4">
                    <div class="symbol symbol-100px text-center">
                        <img src="{{ $usuario->avatar_path ? asset($usuario->avatar_path) : $usuario->avatar }}"
                            alt="avatar" />
                    </div>
                    <span class="fs-2 fw-bold text-center">
                        {{ $usuario->nombre }}
                    </span>
                    <span
                        class="badge badge-light-{{ getRol($usuario->id)['color'] }} py-3 d-flex justify-content-center fs-7">
                        {{ getRol($usuario->id)['nombre'] }}
                    </span>
                    <button type="button" wire:click="logout"
                        class="btn btn-flex flex-center btn-secondary btn-custom text-nowrap px-0 h-40px w-100">
                        <span class="btn-label">
                            Cerrar sesión
                        </span>
                    </button>
                </div>
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <div class="menu-item">
                        <div class="menu-content">
                            <span class="menu-heading fw-bold text-uppercase fs-7">
                                Menú
                            </span>
                        </div>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                            href="{{ route('home.index') }}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-home fs-2"></i>
                            </span>
                            <span class="menu-title">
                                Home
                            </span>
                        </a>
                    </div>

                    <div data-kt-menu-trigger="click"
                        class="menu-item here {{ request()->routeIs('rol.index') || request()->routeIs('permiso.index') ? 'show' : '' }} menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-setting-3 fs-2"></i>
                            </span>
                            <span class="menu-title">Configuración</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('rol.index') ? 'active' : '' }}"
                                    href="{{ route('rol.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Roles
                                    </span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('permiso.index') ? 'active' : '' }}"
                                    href="{{ route('permiso.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">
                                        Permisos
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="https://preview.keenthemes.com/html/metronic/docs"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100">
            <span class="btn-label">Docs & Components</span>
        </a>
    </div>
</div>
