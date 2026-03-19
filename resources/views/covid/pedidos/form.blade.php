@extends('layouts.app')
@section('title', isset($pedido) ? 'Editar Radicado COVID' : 'Nuevo Radicado PAIWeb COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($pedido) ? 'Editar Radicado #'.$pedido->nro_pedido : 'Nuevo Radicado PAIWeb' }}</h4>
    <a href="{{ route('pedidos-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card border-danger"><div class="card-body">
    <form method="POST" action="{{ isset($pedido) ? route('pedidos-covid.update', $pedido) : route('pedidos-covid.store') }}">
        @csrf @if(isset($pedido)) @method('PUT') @endif
        <div class="row g-3">
            @if(!isset($pedido))
            <div class="col-md-2">
                <label class="form-label">Nro Pedido *</label>
                <input type="number" name="nro_pedido" class="form-control" value="{{ old('nro_pedido', $siguiente ?? '') }}" required>
            </div>
            @endif
            <div class="col-md-3">
                <label class="form-label">Radicado PAIWeb</label>
                <input type="text" name="radicado_paiweb" class="form-control" maxlength="100"
                       value="{{ old('radicado_paiweb', $pedido->radicado_paiweb ?? '') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Tipo</label>
                <select name="tipo_pedido" class="form-select">
                    <option value="">-</option>
                    <option value="Pedido" {{ old('tipo_pedido', $pedido->tipo_pedido ?? '') == 'Pedido' ? 'selected' : '' }}>Pedido</option>
                    <option value="Traslado" {{ old('tipo_pedido', $pedido->tipo_pedido ?? '') == 'Traslado' ? 'selected' : '' }}>Traslado</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Observaciones</label>
                <textarea name="observaciones" class="form-control" rows="3">{{ old('observaciones', $pedido->observaciones ?? '') }}</textarea>
            </div>
            <div class="col-12"><button type="submit" class="btn btn-danger">{{ isset($pedido) ? 'Actualizar' : 'Guardar' }}</button></div>
        </div>
    </form>
</div></div>
@endsection
