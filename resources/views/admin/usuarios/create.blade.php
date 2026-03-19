@extends('layouts.app')
@section('title', 'Nuevo Usuario')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus mr-2"></i>Crear usuario</h3>
            </div>
            <form method="POST" action="{{ route('admin.usuarios.store') }}">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label class="form-label">Login <span class="text-danger">*</span></label>
                        <input type="text" name="login" value="{{ old('login') }}"
                               class="form-control" required maxlength="100"
                               placeholder="Nombre de usuario">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contraseña <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" required
                               placeholder="Mínimo 8 caracteres, letras y números">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirmar contraseña <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group mb-0">
                        <label class="form-label">Tipo de usuario <span class="text-danger">*</span></label>
                        <select name="tipo" class="form-control" required>
                            <option value="">-- Seleccionar --</option>
                            @foreach($tipos as $tipo)
                                <option value="{{ $tipo }}" {{ old('tipo') === $tipo ? 'selected' : '' }}>
                                    {{ $tipo }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Se asignarán los permisos estándar del tipo seleccionado.</small>
                    </div>

                </div>
                <div class="card-footer d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i>Crear usuario
                    </button>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i>Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
