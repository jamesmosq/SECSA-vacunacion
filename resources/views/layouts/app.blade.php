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
    /* ═══════════════════════════════════════════════════════════════════
       PALETA BOOTSTRAP 5 — Variables CSS globales
       ═══════════════════════════════════════════════════════════════════ */
    :root, [data-bs-theme=light] {
        --bs-blue:         #0d6efd;
        --bs-indigo:       #6610f2;
        --bs-purple:       #6f42c1;
        --bs-pink:         #d63384;
        --bs-red:          #dc3545;
        --bs-orange:       #fd7e14;
        --bs-yellow:       #ffc107;
        --bs-green:        #198754;
        --bs-teal:         #20c997;
        --bs-cyan:         #0dcaf0;
        --bs-black:        #000;
        --bs-white:        #fff;
        --bs-gray:         #6c757d;
        --bs-gray-dark:    #343a40;
        --bs-gray-100:     #f8f9fa;
        --bs-gray-200:     #e9ecef;
        --bs-gray-300:     #dee2e6;
        --bs-gray-400:     #ced4da;
        --bs-gray-500:     #adb5bd;
        --bs-gray-600:     #6c757d;
        --bs-gray-700:     #495057;
        --bs-gray-800:     #343a40;
        --bs-gray-900:     #212529;
        --bs-primary:      #0d6efd;
        --bs-secondary:    #6c757d;
        --bs-success:      #198754;
        --bs-info:         #0dcaf0;
        --bs-warning:      #ffc107;
        --bs-danger:       #dc3545;
        --bs-light:        #f8f9fa;
        --bs-dark:         #212529;
        --bs-primary-rgb:  13,110,253;
        --bs-secondary-rgb:108,117,125;
        --bs-success-rgb:  25,135,84;
        --bs-info-rgb:     13,202,240;
        --bs-warning-rgb:  255,193,7;
        --bs-danger-rgb:   220,53,69;
        --bs-light-rgb:    248,249,250;
        --bs-dark-rgb:     33,37,41;
        --bs-body-color:   #212529;
        --bs-body-bg:      #fff;
        /* Colores de la aplicación */
        --app-sidebar-bg:      #1a2332;
        --app-sidebar-brand:   #111c2b;
        --app-sidebar-header:  rgba(255,255,255,.38);
        --app-sidebar-link:    rgba(255,255,255,.75);
        --app-sidebar-active:  var(--bs-primary);
        --app-content-bg:      #f0f2f5;
        --app-navbar-bg:       var(--bs-primary);
    }

    /* ═══════════════════════════════════════════════════════════════════
       NAVBAR
       ═══════════════════════════════════════════════════════════════════ */
    .main-header.navbar {
        background-color: var(--app-navbar-bg) !important;
        box-shadow: 0 2px 8px rgba(13,110,253,.35);
    }
    .main-header .navbar-brand-text,
    .main-header .brand-link {
        color: #fff !important;
    }

    /* ═══════════════════════════════════════════════════════════════════
       SIDEBAR
       ═══════════════════════════════════════════════════════════════════ */
    .main-sidebar {
        background-color: var(--app-sidebar-bg) !important;
    }
    .main-sidebar .brand-link {
        background-color: var(--app-sidebar-brand) !important;
        border-bottom: 1px solid rgba(255,255,255,.08) !important;
    }
    .main-sidebar .brand-text {
        color: rgba(255,255,255,.9) !important;
        font-size: 0.82rem !important;
        font-weight: 500 !important;
        letter-spacing: .02em;
    }

    /* Links del sidebar */
    .sidebar .nav-sidebar .nav-link {
        color: var(--app-sidebar-link) !important;
        border-radius: 6px;
        margin: 1px 6px;
        transition: background .15s ease, color .15s ease;
    }
    .sidebar .nav-sidebar .nav-link:hover {
        background-color: rgba(255,255,255,.08) !important;
        color: #fff !important;
    }

    /* Ítem activo */
    .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
    .sidebar-dark-primary .nav-sidebar > .nav-item.menu-open > .nav-link {
        background: linear-gradient(90deg, var(--bs-primary), #3d8bfd) !important;
        color: #fff !important;
        box-shadow: 0 2px 8px rgba(13,110,253,.4);
    }

    /* Subniveles treeview */
    .nav-treeview .nav-link {
        padding-left: 2.2rem !important;
        font-size: 0.85rem !important;
        color: rgba(255,255,255,.65) !important;
    }
    .nav-treeview .nav-link:hover {
        color: #fff !important;
        background-color: rgba(255,255,255,.06) !important;
    }
    .nav-treeview .nav-link.active {
        background-color: rgba(13,110,253,.25) !important;
        color: #fff !important;
        font-weight: 500;
    }
    .nav-treeview .nav-icon { font-size: 0.4rem !important; }

    /* Headers de categoría (colapsables) */
    .sidebar .nav-sidebar .nav-link .nav-icon {
        color: rgba(255,255,255,.5);
        transition: color .15s;
    }
    .sidebar .nav-sidebar .nav-link:hover .nav-icon,
    .sidebar .nav-sidebar .nav-link.active .nav-icon {
        color: #fff;
    }
    .sidebar .nav-sidebar .nav-link > p > .right {
        transition: transform .2s ease;
    }
    .sidebar .nav-item.menu-open > .nav-link > p > .right {
        transform: rotate(-90deg);
    }

    /* Separador sección admin */
    .sidebar .nav-header-admin {
        color: rgba(255,193,7,.75);
        font-size: 0.68rem;
        letter-spacing: .1em;
        text-transform: uppercase;
        padding: .6rem 1rem .2rem;
        font-weight: 600;
    }
    .sidebar .nav-item.admin-link > .nav-link {
        color: rgba(255,193,7,.8) !important;
    }
    .sidebar .nav-item.admin-link > .nav-link:hover {
        color: #fff !important;
        background-color: rgba(255,193,7,.12) !important;
    }
    .sidebar-dark-primary .nav-sidebar > .nav-item.admin-link > .nav-link.active {
        background: linear-gradient(90deg, #e6a817, #ffc107) !important;
        color: #000 !important;
    }

    /* ═══════════════════════════════════════════════════════════════════
       CONTENT & FOOTER
       ═══════════════════════════════════════════════════════════════════ */
    .content-wrapper {
        background-color: var(--app-content-bg) !important;
    }
    .content-header {
        border-bottom: 1px solid var(--bs-gray-300);
        background: #fff;
        padding-top: .75rem !important;
        padding-bottom: .75rem !important;
    }
    .content-header h4 {
        color: var(--bs-gray-800);
        font-weight: 600;
        font-size: 1.1rem;
    }
    .main-footer {
        background: #fff;
        border-top: 1px solid var(--bs-gray-200);
        color: var(--bs-gray-600) !important;
    }

    /* ═══════════════════════════════════════════════════════════════════
       CARDS
       ═══════════════════════════════════════════════════════════════════ */
    .card { border: none; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
    .card.card-outline.card-primary  { border-top: 3px solid var(--bs-primary)  !important; }
    .card.card-outline.card-success  { border-top: 3px solid var(--bs-success)  !important; }
    .card.card-outline.card-warning  { border-top: 3px solid var(--bs-warning)  !important; }
    .card.card-outline.card-danger   { border-top: 3px solid var(--bs-danger)   !important; }
    .card.card-outline.card-info     { border-top: 3px solid var(--bs-info)     !important; }
    .card-header { background-color: #fff; border-bottom: 1px solid var(--bs-gray-200); }

    /* ═══════════════════════════════════════════════════════════════════
       BOTONES — mapeo a paleta BS5
       ═══════════════════════════════════════════════════════════════════ */
    .btn-primary   { background-color: var(--bs-primary)  !important; border-color: var(--bs-primary)  !important; }
    .btn-success   { background-color: var(--bs-success)  !important; border-color: var(--bs-success)  !important; }
    .btn-danger    { background-color: var(--bs-danger)   !important; border-color: var(--bs-danger)   !important; }
    .btn-warning   { background-color: var(--bs-warning)  !important; border-color: var(--bs-warning)  !important; color: #000 !important; }
    .btn-info      { background-color: var(--bs-info)     !important; border-color: var(--bs-info)     !important; color: #000 !important; }
    .btn-secondary { background-color: var(--bs-secondary)!important; border-color: var(--bs-secondary)!important; }
    .btn-primary:hover  { background-color: #0b5ed7 !important; border-color: #0a58ca !important; }
    .btn-success:hover  { background-color: #157347 !important; border-color: #146c43 !important; }
    .btn-danger:hover   { background-color: #b02a37 !important; border-color: #a52834 !important; }

    /* ═══════════════════════════════════════════════════════════════════
       INFO BOXES
       ═══════════════════════════════════════════════════════════════════ */
    .info-box { border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
    .info-box-icon { border-radius: 8px 0 0 8px; }
    .bg-primary { background-color: var(--bs-primary)  !important; }
    .bg-success { background-color: var(--bs-success)  !important; }
    .bg-warning { background-color: var(--bs-warning)  !important; color: #000; }
    .bg-danger  { background-color: var(--bs-danger)   !important; }
    .bg-info    { background-color: var(--bs-info)     !important; color: #000; }

    /* ═══════════════════════════════════════════════════════════════════
       BADGES
       ═══════════════════════════════════════════════════════════════════ */
    .badge.bg-primary   { background-color: var(--bs-primary)  !important; color: #fff; }
    .badge.bg-secondary { background-color: var(--bs-secondary)!important; color: #fff; }
    .badge.bg-success   { background-color: var(--bs-success)  !important; color: #fff; }
    .badge.bg-danger    { background-color: var(--bs-danger)   !important; color: #fff; }
    .badge.bg-warning   { background-color: var(--bs-warning)  !important; color: #000; }
    .badge.bg-info      { background-color: var(--bs-info)     !important; color: #000; }
    .badge.bg-light     { background-color: var(--bs-light)    !important; color: #000; }
    .badge.bg-dark      { background-color: var(--bs-dark)     !important; color: #fff; }

    /* ═══════════════════════════════════════════════════════════════════
       TABLAS
       ═══════════════════════════════════════════════════════════════════ */
    thead.table-dark th, thead.table-dark td {
        color: #fff;
        background-color: var(--bs-gray-800) !important;
        border-color: var(--bs-gray-700);
    }
    .table-hover tbody tr:hover { background-color: rgba(13,110,253,.04); }

    /* ═══════════════════════════════════════════════════════════════════
       FORMULARIOS
       ═══════════════════════════════════════════════════════════════════ */
    .form-label { margin-bottom: .4rem; font-weight: 500; display: inline-block; color: var(--bs-gray-700); }
    select.form-select, select.form-select:focus {
        display: block; width: 100%; padding: .375rem .75rem;
        font-size: 1rem; line-height: 1.5; color: #495057;
        background: #fff; border: 1px solid #ced4da; border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .form-control:focus { border-color: #86b7fe; box-shadow: 0 0 0 .25rem rgba(13,110,253,.25); }

    /* ═══════════════════════════════════════════════════════════════════
       COMPATIBILIDAD BOOTSTRAP 5 → 4
       ═══════════════════════════════════════════════════════════════════ */
    .text-end   { text-align: right  !important; }
    .text-start { text-align: left   !important; }
    .ms-auto    { margin-left:  auto !important; }
    .me-auto    { margin-right: auto !important; }
    .ms-1 { margin-left:  .25rem !important; } .me-1 { margin-right: .25rem !important; }
    .ms-2 { margin-left:  .5rem  !important; } .me-2 { margin-right: .5rem  !important; }
    .ms-3 { margin-left:  1rem   !important; } .me-3 { margin-right: 1rem   !important; }
    .gap-2 { gap: .5rem !important; } .gap-3 { gap: 1rem !important; }
    .btn-close { background: transparent; border: 0; font-size: 1.5rem; font-weight: 700; line-height: 1; color: #000; opacity: .5; cursor: pointer; padding: 0; }
    .btn-close::after { content: "\00d7"; }
    .btn-close:hover  { opacity: .75; }
    [data-bs-dismiss] { cursor: pointer; }
    </style>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    {{-- ── Navbar ──────────────────────────────────────────────────────── --}}
    <nav class="main-header navbar navbar-expand navbar-dark border-bottom-0">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            @endauth
        </ul>

        <span class="navbar-brand font-weight-bold mx-3" style="font-size:.9rem; white-space:normal; color:#fff;">
            {{ strtoupper($portalConfig->titulo ?? 'Secretaría de Salud — Vacunación') }}
        </span>

        @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex align-items-center">
                <span class="small mr-3" style="color:rgba(255,255,255,.85);">
                    <i class="fas fa-user-circle mr-1"></i>{{ auth()->user()->login }}
                    <span class="badge bg-dark ml-1" style="font-size:.65rem; opacity:.8;">{{ auth()->user()->tipo }}</span>
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

    {{-- ── Sidebar ──────────────────────────────────────────────────────── --}}
    @auth
    <aside class="main-sidebar elevation-3">
        <a href="{{ route('principal') }}" class="brand-link">
            @if(!empty($portalConfig->logo))
                <img src="{{ asset('storage/logos/' . $portalConfig->logo) }}"
                     alt="Logo" class="brand-image"
                     style="max-height:33px; width:auto; margin-left:.5rem; opacity:.9;">
            @else
                <i class="fas fa-syringe brand-image img-circle elevation-1"
                   style="font-size:1.4rem; margin-left:.8rem; margin-right:.4rem; color:rgba(255,255,255,.85);"></i>
            @endif
            <span class="brand-text">Secretaría de Salud</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2 pb-3">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent"
                    data-widget="treeview" data-accordion="false" role="menu">

                    {{-- Inicio --}}
                    <li class="nav-item">
                        <a href="{{ route('principal') }}"
                           class="nav-link {{ request()->routeIs('principal') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Menú dinámico agrupado por categorías (treeview) --}}
                    @php
                        $opciones = auth()->user()->opciones()->orderBy('orden')->get();

                        // Agrupar: cada ítem sin página abre un nuevo grupo
                        $grupos = [];
                        foreach ($opciones as $op) {
                            if (empty($op->pagina)) {
                                $grupos[] = ['titulo' => $op->opcion, 'items' => []];
                            } else {
                                if (!empty($grupos)) {
                                    $grupos[count($grupos) - 1]['items'][] = $op;
                                }
                            }
                        }

                        // Icono por categoría
                        $iconos = [
                            'PAI — Inventario'      => 'fas fa-vials',
                            'PAI — Catálogos'       => 'fas fa-database',
                            'PAI — Reportes'        => 'fas fa-chart-bar',
                            'Cohorte e Indicadores' => 'fas fa-chart-line',
                            'Carnets'               => 'fas fa-id-card',
                            'COVID — Inventario'    => 'fas fa-syringe',
                            'COVID — Catálogos'     => 'fas fa-list',
                            'COVID — Reportes'      => 'fas fa-file-medical-alt',
                        ];
                    @endphp

                    @foreach($grupos as $grupo)
                        @php
                            $tieneActivo = collect($grupo['items'])->first(function ($item) {
                                $p = trim($item->pagina, '/');
                                return request()->is($p) || request()->is($p . '/*');
                            });
                            $icono = $iconos[$grupo['titulo']] ?? 'fas fa-folder';
                        @endphp
                        @if(!empty($grupo['items']))
                        <li class="nav-item has-treeview {{ $tieneActivo ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ $tieneActivo ? 'active' : '' }}">
                                <i class="nav-icon {{ $icono }}"></i>
                                <p>{{ $grupo['titulo'] }}<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($grupo['items'] as $item)
                                    @php
                                        $p = trim($item->pagina, '/');
                                        $activo = request()->is($p) || request()->is($p . '/*');
                                    @endphp
                                    <li class="nav-item">
                                        <a href="{{ url($item->pagina) }}"
                                           class="nav-link {{ $activo ? 'active' : '' }}">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>{{ $item->opcion }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                    @endforeach

                    {{-- Sección Administración (solo Administrador) --}}
                    @if(auth()->user()->tipo === 'Administrador')
                        <li class="nav-header nav-header-admin mt-2">
                            <i class="fas fa-shield-alt mr-1"></i> Administración
                        </li>
                        <li class="nav-item admin-link">
                            <a href="{{ route('admin.usuarios.index') }}"
                               class="nav-link {{ request()->is('admin/usuarios*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item admin-link">
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

    {{-- ── Content Wrapper ─────────────────────────────────────────────── --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="m-0">@yield('title', 'Inicio')</h4>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid py-3">
                @yield('content')
            </div>
        </section>
    </div>

    @auth
    <footer class="main-footer text-sm">
        <strong>{{ $portalConfig->titulo ?? 'Secretaría de Salud' }}</strong>
        <div class="float-right d-none d-sm-inline-block">
            Sistema de Vacunación
        </div>
    </footer>
    @endauth

</div><!-- /.wrapper -->

<script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    // ── Compatibilidad data-bs-dismiss ─────────────────────────────────
    $(document).on('click', '[data-bs-dismiss]', function () {
        var target = $(this).data('bs-dismiss');
        if (target === 'modal') {
            $(this).closest('.modal').modal('hide');
        } else {
            $(this).closest('.' + target).alert('close');
        }
    });

    // ── Alertas flash (SweetAlert2 toast) ──────────────────────────────
    @if(session('success'))
    Swal.fire({
        toast: true, position: 'top-end', icon: 'success',
        title: @json(session('success')),
        showConfirmButton: false, timer: 4000, timerProgressBar: true,
    });
    @endif

    // ── Errores de validación (modal) ───────────────────────────────────
    @if($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Errores de validación',
        html: @json('<ul style="text-align:left;margin:0;padding-left:1.2rem">'
            . implode('', array_map(fn($e) => '<li>' . e($e) . '</li>', $errors->all()))
            . '</ul>'),
        confirmButtonColor: 'var(--bs-primary)',
        confirmButtonText: 'Entendido',
    });
    @endif

    // ── Confirmación de eliminación ─────────────────────────────────────
    $(document).on('submit', 'form[data-confirm]', function (e) {
        e.preventDefault();
        var form = this;
        var msg  = $(form).data('confirm') || '¿Desea eliminar este registro?';
        Swal.fire({
            title: '¿Está seguro?', text: msg, icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--bs-danger)',
            cancelButtonColor:  'var(--bs-secondary)',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText:  'Cancelar',
            reverseButtons: true,
        }).then(function (result) {
            if (result.isConfirmed) {
                $(form).removeAttr('data-confirm');
                form.submit();
            }
        });
    });
</script>
@stack('scripts')
</body>
</html>
