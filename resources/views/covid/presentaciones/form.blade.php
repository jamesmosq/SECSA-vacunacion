@extends('layouts.app')
@section('title', isset($presentacion) ? 'Editar Presentación COVID' : 'Nueva Presentación COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($presentacion) ? 'Editar' : 'Nueva' }} Presentación</h4>
    <a href="{{ route('presentaciones-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger"><div class="card-body">
    <form method="POST" action="{{ isset($presentacion) ? route('presentaciones-covid.update', $presentacion) : route('presentaciones-covid.store') }}">
        @csrf @if(isset($presentacion)) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label">Descripción *</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                   value="{{ old('descripcion', $presentacion->descripcion ?? '') }}" maxlength="200" required>
            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-danger">{{ isset($presentacion) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div></div>
@endsection
