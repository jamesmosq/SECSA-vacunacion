@extends('layouts.app')
@section('title', 'Lotes')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Lotes de Vacunas</h4>
    <a href="{{ route('lotes.create') }}" class="btn btn-primary">+ Nuevo Lote</a>
</div>

<div class="table-responsive">
    <table class="table table-sm table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>Lote</th>
                <th>Insumo</th>
                <th>Presentación</th>
                <th>Laboratorio</th>
                <th>Vencimiento</th>
                <th>Saldo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lotes as $lote)
            <tr class="{{ $lote->estado === 'Inactivo' ? 'text-muted' : '' }}">
                <td>{{ $lote->lote }}</td>
                <td>{{ $lote->insumo }}</td>
                <td>{{ $lote->presentacion }}</td>
                <td>{{ $lote->laboratorio }}</td>
                <td>{{ $lote->fecha_vencimiento?->format('d/m/Y') }}</td>
                <td class="text-end">{{ number_format($lote->saldo) }}</td>
                <td>
                    <span class="badge {{ $lote->estado === 'Activo' ? 'bg-success' : 'bg-secondary' }}">
                        {{ $lote->estado }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('lotes.edit', $lote->lote) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form method="POST" action="{{ route('lotes.destroy', $lote->lote) }}" class="d-inline"
                          data-confirm="¿Eliminar el lote {{ $lote->lote }}? Esta acción no se puede deshacer.">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $lotes->links() }}
@endsection
