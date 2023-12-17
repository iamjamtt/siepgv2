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

<body id="kt_body" class="app-blank">

    <script>
        var defaultThemeMode = "light"; var themeMode;
        if ( document.documentElement ) {
            if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if ( localStorage.getItem("data-bs-theme") !== null ) {
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

    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                            data-kt-redirect-url="index.html" action="#">
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
                                    <input type="email" class="form-control" placeholder="Ingrese su correo electrónico"
                                        name="correo_electronico" id="correo_electronico" />
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
                                    <input type="password" class="form-control" placeholder="Ingrese su contraseña"
                                        name="contraseña" id="contraseña" />
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

            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url({{ asset('assets/media/auth/bg10-dark.jpeg') }})">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">

                    <a href="index.html" class="mb-0 mb-lg-12">
                        <img alt="Logo" src="{{ asset('assets/media/logo-pg.png') }}" class="h-50px h-lg-150px" />
                    </a>

                    <h1 class="d-none d-lg-block text-white fs-2hx fw-bolder text-center mb-7">
                        Bienvenido a Siepg
                    </h1>

                    <div class="d-none d-lg-block text-white fs-5 text-center">
                        Sistema Integrado de Escuela de Posgrado
                        <br>
                        de la
                        <br>
                        <span class="text-warning">
                            Universidad Nacional de Ucayali
                        </span>
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
</body>

</html>
