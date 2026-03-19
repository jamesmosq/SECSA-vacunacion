@extends('layouts.app')
@section('title', isset($lote) ? 'Editar Lote COVID' : 'Nuevo Lote COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($lote) ? 'Editar Lote: '.$lote->lote : 'Nuevo Lote' }}</h4>
    <a href="{{ route('lotes-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger">
    <div class="card-body">
        <form method="POST" action="{{ isset($lote) ? route('lotes-covid.update', $lote->lote) : route('lotes-covid.store') }}">
            @csrf
            @if(isset($lote)) @method('PUT') @endif
            <div class="row g-3">
                @if(!isset($lote))
                <div class="col-md-4">
                    <label class="form-label">Lote *</label>
                    <input type="text" name="lote" class="form-control text-uppercase @error('lote') is-invalid @enderror"
                           value="{{ old('lote') }}" required maxlength="30" style="text-transform:uppercase">
                    @error('lote') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                @endif
                <div class="col-md-4">
                    <label class="form-label">Insumo *</label>
                    <select name="insumo" class="form-select" required>
                        <option value=""></option>
                        @foreach($insumos as $ins)
                            <option value="{{ $ins }}" {{ old('insumo', $lote->insumo ?? '') == $ins ? 'selected' : '' }}>{{ $ins }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Presentación *</label>
                    <select name="presentacion" class="form-select" required>
                        <option value=""></option>
                        @foreach($presentaciones as $pres)
                            <option value="{{ $pres }}" {{ old('presentacion', $lote->presentacion ?? '') == $pres ? 'selected' : '' }}>{{ $pres }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Laboratorio</label>
                    <select name="laboratorio" class="form-select">
                        <option value=""></option>
                        @foreach($laboratorios as $lab)
                            <option value="{{ $lab }}" {{ old('laboratorio', $lote->laboratorio ?? '') == $lab ? 'selected' : '' }}>{{ $lab }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha Vencimiento</label>
                    <input type="date" name="fecha_vencimiento" class="form-control"
                           value="{{ old('fecha_vencimiento', isset($lote) ? $lote->fecha_vencimiento?->format('Y-m-d') : '') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Saldo *</label>
                    <input type="number" name="saldo" class="form-control" value="{{ old('saldo', $lote->saldo ?? 0) }}" min="0" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Estado *</label>
                    <select name="estado" class="form-select" required>
                        <option value="Activo" {{ old('estado', $lote->estado ?? 'Activo') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ old('estado', $lote->estado ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Observación</label>
                    <textarea name="observacion" class="form-control" rows="2">{{ old('observacion', $lote->observacion ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger">{{ isset($lote) ? 'Actualizar' : 'Guardar' }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
