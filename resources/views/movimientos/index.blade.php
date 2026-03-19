@extends('layouts.app')
@section('title', 'Movimientos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Movimientos de Inventario</h4>
    <a href="{{ route('movimientos.create') }}" class="btn btn-primary">+ Nuevo Movimiento</a>
</div>

<form method="POST" action="{{ route('movimientos.por-institucion') }}" class="row g-2 mb-3">
    @csrf
    <div class="col-md-4">
        <select name="institucion" class="form-select">
            <option value="">-- Filtrar por institución --</option>
            @foreach($instituciones as $inst)
                <option value="{{ $inst }}" {{ request('institucion') == $inst ? 'selected' : '' }}>{{ $inst }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">Filtrar</button>
    </div>
</form>

@if(isset($movimientos) && $movimientos->count())
<div class="table-responsive">
    <table class="table table-sm table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Institución</th>
                <th>Fecha</th>
                <th>Nro Pedido</th>
                <th>Lote</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movimientos as $mov)
            <tr>
                <td>{{ $mov->id }}</td>
                <td>{{ $mov->institucion }}</td>
                <td>{{ $mov->fecha_movimiento->format('d/m/Y') }}</td>
                <td>{{ $mov->nro_pedido }}</td>
                <td>{{ $mov->lote }}</td>
                <td class="text-end text-success">{{ $mov->ingreso > 0 ? number_format($mov->ingreso) : '' }}</td>
                <td class="text-end text-danger">{{ $mov->salida > 0 ? number_format($mov->salida) : '' }}</td>
                <td>
                    <a href="{{ route('movimientos.edit', $mov) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form method="POST" action="{{ route('movimientos.destroy', $mov) }}" class="d-inline"
                          data-confirm="¿Eliminar el movimiento #{{ $mov->id }}? El saldo del lote será revertido.">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $movimientos->links() }}
@else
    <p class="text-muted">Seleccione una institución para ver sus movimientos, o cree un nuevo movimiento.</p>
@endif
@endsection
