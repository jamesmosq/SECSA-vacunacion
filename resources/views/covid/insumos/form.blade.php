@extends('layouts.app')
@section('title', isset($insumo) ? 'Editar Insumo COVID' : 'Nuevo Insumo COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($insumo) ? 'Editar Insumo' : 'Nuevo Insumo' }}</h4>
    <a href="{{ route('insumos-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger"><div class="card-body">
    <form method="POST" action="{{ isset($insumo) ? route('insumos-covid.update', $insumo) : route('insumos-covid.store') }}">
        @csrf @if(isset($insumo)) @method('PUT') @endif
        <div class="mb-3">
            <label class="form-label">Nombre *</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                   value="{{ old('nombre', $insumo->nombre ?? '') }}" maxlength="200" required>
            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-danger">{{ isset($insumo) ? 'Actualizar' : 'Guardar' }}</button>
    </form>
</div></div>
@endsection
