@extends('layouts.app')
@section('title', isset($laboratorio) ? 'Editar Laboratorio' : 'Nuevo Laboratorio')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>{{ isset($laboratorio) ? 'Editar Laboratorio' : 'Nuevo Laboratorio' }}</h4>
    <a href="{{ route('laboratorios.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ isset($laboratorio) ? route('laboratorios.update', $laboratorio) : route('laboratorios.store') }}">
        @csrf @if(isset($laboratorio)) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                   value="{{ old('nombre', $laboratorio->nombre ?? '') }}" maxlength="200" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($laboratorio) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div></div>
@endsection
