<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Siepg - Escuela de Posgrado' }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800,900" />

    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-footer-fixed="true" class="app-default">

    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <livewire:components.navbar-app>
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <livewire:components.sidebar-app>
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        {{ $slot }}
                        <div id="kt_app_footer" class="app-footer">
                            <div
                                class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                                <div class="text-gray-900 order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1">{{ date('Y') }}&copy;</span>
                                    <a href="https://keenthemes.com" target="_blank"
                                        class="text-gray-800 text-hover-primary">
                                        Siepg - Escuela de Posgrado
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </div>

    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>

    <script>
        document.addEventListener('livewire:navigated', () => {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toastr-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            window.addEventListener('toast', event => {
                if (event.detail.tipo == 'success') {
                    toastr.success(event.detail.mensaje, event.detail.titulo);
                } else if (event.detail.tipo == 'error') {
                    toastr.error(event.detail.mensaje, event.detail.titulo);
                } else if (event.detail.tipo == 'warning') {
                    toastr.warning(event.detail.mensaje, event.detail.titulo);
                } else if (event.detail.tipo == 'info') {
                    toastr.info(event.detail.mensaje, event.detail.titulo);
                }
            })

            window.addEventListener('modal', event => {
                $(event.detail.modal).modal(event.detail.action);
            })
        })
    </script>
</body>

</html>
