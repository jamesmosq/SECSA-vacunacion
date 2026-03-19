@extends('layouts.app')
@section('title', isset($presentacion) ? 'Editar Presentación' : 'Nueva Presentación')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>{{ isset($presentacion) ? 'Editar Presentación' : 'Nueva Presentación' }}</h4>
    <a href="{{ route('presentaciones.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ isset($presentacion) ? route('presentaciones.update', $presentacion) : route('presentaciones.store') }}">
        @csrf @if(isset($presentacion)) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label">Descripción *</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                   value="{{ old('descripcion', $presentacion->descripcion ?? '') }}" maxlength="200" required>
            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($presentacion) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div></div>
@endsection
