@extends('layouts.app')
@section('title', isset($carnet) ? 'Editar Carnet' : 'Nuevo Carnet FA y SR')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>{{ isset($carnet) ? 'Editar Carnet #'.$carnet->id : 'Nuevo Carnet FA y SR' }}</h4>
    <a href="{{ route('carnets.index') }}" class="btn btn-secondary">Volver</a>
</div>
<div class="card"><div class="card-body">
    <form method="POST" action="{{ isset($carnet) ? route('carnets.update', $carnet) : route('carnets.store') }}">
        @csrf @if(isset($carnet)) @method('PUT') @endif
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Fecha *</label>
                <input type="date" name="fecha" class="form-control" required
                       value="{{ old('fecha', isset($carnet) ? $carnet->fecha->format('Y-m-d') : date('Y-m-d')) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Tipo Identificación *</label>
                <select name="tipo_id" class="form-select" required>
                    @foreach($tiposId as $t)
                        <option value="{{ $t }}" {{ old('tipo_id', $carnet->tipo_id ?? '') == $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Número de Identificación *</label>
                <input type="text" name="numero_id" class="form-control" maxlength="50" required
                       value="{{ old('numero_id', $carnet->numero_id ?? '') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Lugar de Expedición *</label>
                <input type="text" name="expedicion_id" class="form-control" maxlength="150" required
                       value="{{ old('expedicion_id', $carnet->expedicion_id ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nombres y Apellidos *</label>
                <input type="text" name="nombres" class="form-control text-uppercase" maxlength="200" required
                       value="{{ old('nombres', $carnet->nombres ?? '') }}" style="text-transform:uppercase">
            </div>
            <div class="col-md-6">
                <label class="form-label">Persona que Expide *</label>
                <input type="text" name="persona_expide" class="form-control text-uppercase" maxlength="200" required
                       value="{{ old('persona_expide', $carnet->persona_expide ?? '') }}" style="text-transform:uppercase">
            </div>
            <div class="col-12"><button type="submit" class="btn btn-primary">{{ isset($carnet) ? 'Actualizar' : 'Guardar' }}</button></div>
        </div>
    </form>
</div></div>

@if(!isset($carnet) && isset($carnets) && $carnets->total() > 0)
<div class="card mt-4">
    <div class="card-header"><strong>Carnets registrados</strong></div>
    <div class="table-responsive">
        <table class="table table-sm table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Nombres y Apellidos</th>
                    <th>Tipo ID</th>
                    <th>Número ID</th>
                    <th>Expedición</th>
                    <th>Persona que Expide</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($carnets as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->fecha->format('d/m/Y') }}</td>
                    <td>{{ $c->nombres }}</td>
                    <td>{{ $c->tipo_id }}</td>
                    <td>{{ $c->numero_id }}</td>
                    <td>{{ $c->expedicion_id }}</td>
                    <td>{{ $c->persona_expide }}</td>
                    <td>
                        <a href="{{ route('carnets.show', $c) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        <a href="{{ route('carnets.descargar', $c) }}" class="btn btn-sm btn-outline-success">↓ docx</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if($carnets->hasPages())
    <div class="card-footer">{{ $carnets->links() }}</div>
    @endif
</div>
@endif
@endsection
