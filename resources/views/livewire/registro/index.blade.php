<div class="d-flex flex-column flex-column-fluid">
    {{-- <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    <!-- Título de la página -->
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Layout Options</li>
                </ul>
            </div>
        </div>
    </div> --}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="row g-5">
                <div class="col-md-7">
                    <div class="card card-dashed">
                        <div class="card-body">
                            <div class="card-px text-center py-md-14 my-5">
                                <h2 class="fs-2x mb-7" style="font-weight: 700">
                                    Bienvenidos al
                                    <br>
                                    Sistema Integrado de la Escuela de Posgrado
                                </h2>

                                <h3 class="fs-1 fw-bold mb-10">
                                    {{ getProceso() }}
                                </h3>

                                <div class="text-center px-4 mb-10">
                                    <img class="mw-100 mh-200px" alt="logo"
                                        src="{{ asset('assets/media/logo-pg.png') }}">
                                </div>

                                <p class="text-gray-700 fs-3 fw-semibold">
                                    Universidad Nacional de Ucayali
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row g-5">
                        <div class="col-12">
                            <button class="btn btn-primary w-100">
                                Comenzar Inscripción
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="card card-dashed bg-light-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Estimado/a postulante:
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <ul class="fs-6">
                                        <li class="mb-3">
                                            Si ha realizado el pago de la inscripción, le solicitamos amablemente que
                                            proceda
                                            con su registro haciendo clic en el botón <strong>"Comenzar
                                                Inscripción"</strong>.
                                            De esta manera,
                                            podrá completar el formulario correspondiente y posteriormente validar todos
                                            sus
                                            datos en el proceso de inscripción. Agradecemos su colaboración y quedamos a
                                            su
                                            disposición para cualquier consulta adicional.
                                        </li>
                                        <li class="mb-3">
                                            Una vez que finalice el proceso, se generará su ficha de inscripción
                                            correspondiente.
                                        </li>
                                        <li class="mb-3">
                                            Cualquier incidencia o consulta, puede comunicarse a
                                            <strong>admision_posgrado@unu.edu.pe</strong>
                                        </li>
                                        <li class="mb-3">
                                            <strong>Proporciona datos fidedignos (auténticos).</strong> Recuerda que la
                                            información que proporciones sera derivada a la Oficina Central de Admisión
                                        </li>
                                        <li class="mb-3">
                                            <strong>Se muy cuidadoso al completar cada información solicidad por el
                                                Sistema de
                                                Inscripción.</strong> Ya que, la información proporcionada tiene
                                            caracter de
                                            Declaración Jurada.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card card-dashed bg-light-warning">
                        <div class="card-header">
                            <h3 class="card-title">
                                Recomendación antes de comenzar su inscripción:
                            </h3>
                        </div>
                        <div class="card-body">
                            <ul class="fs-6">
                                <li class="mb-3">
                                    Fotocopia ampliada de DNI. En casos de postulantes extranjeros. Fotocopia legalizada
                                    de carnet de extranjería.
                                </li>
                                <li class="mb-3">
                                    Constancia en línea otorgado por la SUNEDU del maximo grado Académico.
                                </li>
                                <li class="mb-3">
                                    Curriculum Vitae DOCUMENTADO. Ultimos 5 años.
                                </li>
                                <li class="mb-3">
                                    Tema tentativo del Proyecto de tesis (solo para postulantes al Doctorado).
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
