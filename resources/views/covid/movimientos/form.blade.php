@extends('layouts.app')
@section('title', isset($movimiento) ? 'Editar Movimiento COVID' : 'Nuevo Movimiento COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($movimiento) ? 'Editar Movimiento #'.$movimiento->id : 'Nuevo Movimiento' }}</h4>
    <a href="{{ route('movimientos-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger">
    <div class="card-body">
        <form method="POST" action="{{ isset($movimiento) ? route('movimientos-covid.update', $movimiento) : route('movimientos-covid.store') }}">
            @csrf
            @if(isset($movimiento)) @method('PUT') @endif
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label">Institución *</label>
                    <select name="institucion" class="form-select" required>
                        <option value=""></option>
                        @foreach($instituciones as $inst)
                            <option value="{{ $inst }}" {{ old('institucion', $movimiento->institucion ?? '') == $inst ? 'selected' : '' }}>{{ $inst }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha Movimiento *</label>
                    <input type="date" name="fecha_movimiento" class="form-control" required
                           value="{{ old('fecha_movimiento', isset($movimiento) ? $movimiento->fecha_movimiento->format('Y-m-d') : date('Y-m-d')) }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nro Pedido *</label>
                    <select name="nro_pedido" class="form-select" required>
                        <option value="0">Sin pedido (0)</option>
                        @foreach($pedidos as $p)
                            <option value="{{ $p->nro_pedido }}" {{ old('nro_pedido', $movimiento->nro_pedido ?? '') == $p->nro_pedido ? 'selected' : '' }}>
                                {{ $p->nro_pedido }} {{ $p->radicado_paiweb ? '- '.$p->radicado_paiweb : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Lote *</label>
                    <select name="lote" class="form-select" required>
                        <option value=""></option>
                        @foreach($lotes as $l)
                            <option value="{{ $l->lote }}" {{ old('lote', $movimiento->lote ?? '') == $l->lote ? 'selected' : '' }}>
                                {{ $l->lote }} - {{ $l->insumo }} (Saldo: {{ $l->saldo }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Ingreso *</label>
                    <input type="number" name="ingreso" class="form-control" min="0" required value="{{ old('ingreso', $movimiento->ingreso ?? 0) }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Salida *</label>
                    <input type="number" name="salida" class="form-control" min="0" required value="{{ old('salida', $movimiento->salida ?? 0) }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Observaciones</label>
                    <textarea name="observaciones" class="form-control" rows="2">{{ old('observaciones', $movimiento->observaciones ?? '') }}</textarea>
                </div>
                <div class="col-12"><button type="submit" class="btn btn-danger">{{ isset($movimiento) ? 'Actualizar' : 'Guardar' }}</button></div>
            </div>
        </form>
    </div>
</div>
@endsection
