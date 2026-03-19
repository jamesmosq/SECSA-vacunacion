@extends('layouts.app')
@section('title', 'Editar Usuario: ' . $usuario->login)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">

        {{-- Datos del usuario --}}
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user-edit mr-2"></i>Editar: <strong>{{ $usuario->login }}</strong>
                </h3>
            </div>
            <form method="POST" action="{{ route('admin.usuarios.update', $usuario) }}">
                @csrf @method('PUT')
                <div class="card-body">

                    <div class="form-group">
                        <label class="form-label">Login <span class="text-danger">*</span></label>
                        <input type="text" name="login"
                               value="{{ old('login', $usuario->login) }}"
                               class="form-control" required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Tipo de usuario <span class="text-danger">*</span></label>
                        <select name="tipo" class="form-control" required>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo }}"
                                    {{ old('tipo', $usuario->tipo) === $tipo ? 'selected' : '' }}>
                                    {{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="reset_permisos"
                               value="1" id="chkResetPermisos"
                               {{ old('reset_permisos') ? 'checked' : '' }}>
                        <label class="form-check-label" for="chkResetPermisos">
                            Restablecer permisos al estándar del tipo seleccionado
                            <small class="text-muted d-block">
                                Reemplaza los permisos actuales con los predeterminados del tipo.
                            </small>
                        </label>
                    </div>

                </div>
                <div class="card-footer d-flex gap-2">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save mr-1"></i>Guardar cambios
                    </button>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>Cancelar
                    </a>
                </div>
            </form>
        </div>

        {{-- Eliminar usuario --}}
        @if($usuario->id !== auth()->id())
        <div class="card card-outline card-danger mt-3">
            <div class="card-header">
                <h3 class="card-title text-danger"><i class="fas fa-exclamation-triangle mr-2"></i>Zona de peligro</h3>
            </div>
            <div class="card-body">
                <p class="text-muted mb-2">Eliminar este usuario borrará también todos sus permisos de acceso.</p>
                <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario) }}"
                      data-confirm="¿Eliminar al usuario '{{ $usuario->login }}'? Esta acción no se puede deshacer.">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash mr-1"></i>Eliminar usuario
                    </button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
