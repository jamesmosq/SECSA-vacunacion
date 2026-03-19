@extends('layouts.app')
@section('title', isset($institucion) ? 'Editar Institución' : 'Nueva Institución')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>{{ isset($institucion) ? 'Editar Institución' : 'Nueva Institución' }}</h4>
    <a href="{{ route('instituciones.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ isset($institucion) ? route('instituciones.update', $institucion) : route('instituciones.store') }}">
        @csrf @if(isset($institucion)) @method('PUT') @endif
        <div class="row g-3">
            @if(!isset($institucion))
            <div class="col-md-3">
                <label class="form-label">Código Habilitación *</label>
                <input type="number" name="codigo_habilitacion" class="form-control" value="{{ old('codigo_habilitacion') }}" required>
            </div>
            @endif
            <div class="col-md-7">
                <label class="form-label">Nombre Institución *</label>
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
            <div class="col-12"><button type="submit" class="btn btn-primary">{{ isset($institucion) ? 'Actualizar' : 'Guardar' }}</button></div>
        </div>
    </form>
</div></div>
@endsection
