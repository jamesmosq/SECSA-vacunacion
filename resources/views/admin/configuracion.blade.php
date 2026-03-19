@extends('layouts.app')
@section('title', 'Configuración del Portal')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cog mr-2"></i>Configuración del portal</h3>
            </div>
            <form method="POST" action="{{ route('admin.configuracion.update') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label class="form-label">Título del portal <span class="text-danger">*</span></label>
                        <input type="text" name="titulo"
                               value="{{ old('titulo', $config->titulo) }}"
                               class="form-control" required maxlength="255"
                               placeholder="Ej: Secretaría de Salud — Vacunación">
                        <small class="text-muted">Se muestra en la barra de navegación superior.</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Logo del portal</label>

                        @if($config->logo)
                        <div class="mb-2">
                            <p class="mb-1 text-muted small">Logo actual:</p>
                            <img src="{{ asset('storage/logos/' . $config->logo) }}"
                                 alt="Logo actual"
                                 style="max-height:80px; max-width:200px; border:1px solid #dee2e6; border-radius:4px; padding:4px; background:#fff;">
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="eliminar_logo"
                                   value="1" id="chkEliminarLogo">
                            <label class="form-check-label text-danger" for="chkEliminarLogo">
                                Eliminar logo actual
                            </label>
                        </div>
                        @else
                        <p class="text-muted small mb-1">No hay logo configurado. Se muestra el ícono de jeringa por defecto.</p>
                        @endif

                        <input type="file" name="logo" class="form-control-file mt-1"
                               accept="image/jpeg,image/png,image/gif,image/svg+xml,image/webp">
                        <small class="text-muted">Formatos: JPG, PNG, GIF, SVG, WebP. Máximo 2 MB.
                            Se muestra en la barra lateral (sidebar), recomendado 40×40 px o similar.</small>
                    </div>

                    @if(!file_exists(public_path('storage')))
                    <div class="callout callout-warning mt-2">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Para que el logo sea visible, ejecute <code>php artisan storage:link</code> una vez en el servidor.
                    </div>
                    @endif

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>Guardar configuración
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
