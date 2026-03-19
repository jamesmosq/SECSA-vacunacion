<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $portalConfig->titulo ?? 'Vacunación')</title>

    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        /* Compatibilidad Bootstrap 5 → Bootstrap 4 */
        .text-end { text-align: right !important; }
        .text-start { text-align: left !important; }
        .ms-auto { margin-left: auto !important; }
        .me-auto { margin-right: auto !important; }
        .ms-1 { margin-left: .25rem !important; }
        .ms-2 { margin-left: .5rem !important; }
        .ms-3 { margin-left: 1rem !important; }
        .me-1 { margin-right: .25rem !important; }
        .me-2 { margin-right: .5rem !important; }
        .me-3 { margin-right: 1rem !important; }
        .gap-2 { gap: .5rem !important; }
        .gap-3 { gap: 1rem !important; }
        select.form-select, select.form-select:focus { display:block; width:100%; padding:.375rem .75rem; font-size:1rem; line-height:1.5; color:#495057; background:#fff; border:1px solid #ced4da; border-radius:.25rem; transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
        .form-label { margin-bottom: .5rem; font-weight: 400; display: inline-block; }
        thead.table-dark th, thead.table-dark td { color:#fff; background-color:#343a40; border-color:#454d55; }
        .badge.bg-primary   { background-color: #007bff !important; color:#fff; }
        .badge.bg-secondary { background-color: #6c757d !important; color:#fff; }
        .badge.bg-success   { background-color: #28a745 !important; color:#fff; }
        .badge.bg-danger    { background-color: #dc3545 !important; color:#fff; }
        .badge.bg-warning   { background-color: #ffc107 !important; color:#212529; }
        .badge.bg-info      { background-color: #17a2b8 !important; color:#fff; }
        .badge.bg-light     { background-color: #f8f9fa !important; color:#212529; }
        .badge.bg-dark      { background-color: #343a40 !important; color:#fff; }
        .btn-close { background: transparent; border:0; font-size:1.5rem; font-weight:700; line-height:1; color:#000; opacity:.5; cursor:pointer; padding:0; }
        .btn-close::after { content:"\00d7"; }
        .btn-close:hover { opacity:.75; }
        [data-bs-dismiss] { cursor: pointer; }
    </style>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 bg-primary">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            @endauth
        </ul>

        <span class="navbar-brand text-white font-weight-bold mx-3" style="font-size:0.9rem; white-space:normal;">
            {{ strtoupper($portalConfig->titulo ?? 'Secretaría de Salud — Vacunación') }}
        </span>

        @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex align-items-center">
                <span class="text-white small mr-3">
                    <i class="fas fa-user-circle mr-1"></i>{{ auth()->user()->login }}
                    <span class="badge bg-secondary ml-1" style="font-size:0.65rem;">{{ auth()->user()->tipo }}</span>
                </span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">
                        <i class="fas fa-sign-out-alt mr-1"></i>Salir
                    </button>
                </form>
            </li>
        </ul>
        @endauth
    </nav>

    @auth
    {{-- Sidebar --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('principal') }}" class="brand-link bg-primary">
            @if(!empty($portalConfig->logo))
                <img src="{{ asset('storage/logos/' . $portalConfig->logo) }}"
                     alt="Logo"
                     class="brand-image"
                     style="max-height:33px; width:auto; margin-left:0.5rem; opacity:.9;">
            @else
                <i class="fas fa-syringe brand-image" style="font-size:1.5rem; margin-left:0.8rem; margin-right:0.5rem; opacity:.8;"></i>
            @endif
            <span class="brand-text font-weight-light" style="font-size:0.85rem;">Secretaría de Salud</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="{{ route('principal') }}" class="nav-link {{ request()->routeIs('principal') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>

                    @php $opciones = auth()->user()->opciones()->orderBy('orden')->get(); @endphp
                    @foreach($opciones as $op)
                        @if(empty($op->pagina))
                            <li class="nav-header">{{ strtoupper($op->opcion) }}</li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url($op->pagina) }}" class="nav-link {{ request()->is($op->pagina.'*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-circle" style="font-size:0.5rem;"></i>
                                    <p>{{ $op->opcion }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Sección exclusiva para el Administrador --}}
                    @if(auth()->user()->tipo === 'Administrador')
                        <li class="nav-header">ADMINISTRACIÓN</li>
                        <li class="nav-item">
                            <a href="{{ route('admin.usuarios.index') }}"
                               class="nav-link {{ request()->is('admin/usuarios*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.configuracion') }}"
                               class="nav-link {{ request()->is('admin/configuracion*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Configuración del Portal</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>
    @endauth

    {{-- Content Wrapper --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h4 class="m-0">@yield('title', 'Inicio')</h4>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">

                {{-- Las alertas flash y errores se muestran vía SweetAlert2 (ver script al pie) --}}

                @yield('content')

            </div>
        </section>
    </div>

    @auth
    <footer class="main-footer text-sm text-muted">
        <strong>{{ $portalConfig->titulo ?? 'Secretaría de Salud' }}</strong>
        <div class="float-right d-none d-sm-inline-block">
            Sistema de Vacunación
        </div>
    </footer>
    @endauth

</div>

<script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    // ── Compatibilidad data-bs-dismiss → data-dismiss (BS4) ───────────────
    $(document).on('click', '[data-bs-dismiss]', function() {
        var target = $(this).data('bs-dismiss');
        if (target === 'modal') {
            $(this).closest('.modal').modal('hide');
        } else {
            $(this).closest('.' + target).alert('close');
        }
    });

    // ── Alertas flash via SweetAlert2 ─────────────────────────────────────
    @if(session('success'))
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: @json(session('success')),
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
    });
    @endif

    @if($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Errores de validación',
        html: @json('<ul style="text-align:left;margin:0;padding-left:1.2rem">' . implode('', array_map(fn($e) => '<li>'.e($e).'</li>', $errors->all())) . '</ul>'),
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Entendido',
    });
    @endif

    // ── Confirmación de eliminación via SweetAlert2 ───────────────────────
    $(document).on('submit', 'form[data-confirm]', function (e) {
        e.preventDefault();
        var form = this;
        var mensaje = $(form).data('confirm') || '¿Desea eliminar este registro?';
        Swal.fire({
            title: '¿Está seguro?',
            text: mensaje,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
        }).then(function (result) {
            if (result.isConfirmed) {
                $(form).removeAttr('data-confirm');
                form.submit(); // nativo: jQuery 3 no envía el form con trigger()
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
