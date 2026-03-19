@extends('layouts.app')
@section('title', isset($institucion) ? 'Editar Institución COVID' : 'Nueva Institución COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($institucion) ? 'Editar' : 'Nueva' }} Institución</h4>
    <a href="{{ route('instituciones-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger"><div class="card-body">
    <form method="POST" action="{{ isset($institucion) ? route('instituciones-covid.update', $institucion) : route('instituciones-covid.store') }}">
        @csrf @if(isset($institucion)) @method('PUT') @endif
        <div class="row g-3">
            @if(!isset($institucion))
            <div class="col-md-3">
                <label class="form-label">Código *</label>
                <input type="number" name="codigo_habilitacion" class="form-control" value="{{ old('codigo_habilitacion') }}" required>
            </div>
            @endif
            <div class="col-md-6">
                <label class="form-label">Nombre *</label>
                <input type="text" name="nombre_institucion" class="form-control" maxlength="200"
                       value="{{ old('nombre_institucion', $institucion->nombre_institucion ?? '') }}" required>
            </div>
            <div class="col-md-2">
                <label class="form-label">Estado *</label>
                <select name="estado" class="form-select" required>
                    <option value="Activo" {{ old('estado', $institucion->estado ?? 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                    <option value="Inactivo" {{ old('estado', $institucion->estado ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="col-12"><button type="submit" class="btn btn-danger">{{ isset($institucion) ? 'Actualizar' : 'Guardar' }}</button></div>
        </div>
    </form>
</div></div>
@endsection
