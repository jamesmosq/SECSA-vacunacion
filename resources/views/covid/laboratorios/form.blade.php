@extends('layouts.app')
@section('title', isset($laboratorio) ? 'Editar Laboratorio COVID' : 'Nuevo Laboratorio COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($laboratorio) ? 'Editar Laboratorio' : 'Nuevo Laboratorio' }}</h4>
    <a href="{{ route('laboratorios-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger"><div class="card-body">
    <form method="POST" action="{{ isset($laboratorio) ? route('laboratorios-covid.update', $laboratorio) : route('laboratorios-covid.store') }}">
        @csrf @if(isset($laboratorio)) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                   value="{{ old('nombre', $laboratorio->nombre ?? '') }}" maxlength="200" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-danger">{{ isset($laboratorio) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div></div>
@endsection
