@extends('layouts.app')
@section('title', 'Lotes')
@section('content')

@if(session('errores_csv'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Importación con advertencias:</strong>
    <ul class="mb-0 mt-1">
        @foreach(session('errores_csv') as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar"><span>&times;</span></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Lotes de Vacunas</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('lotes.plantilla') }}" class="btn btn-outline-secondary">
            ↓ Descargar Plantilla CSV
        </a>
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalImportar">
            ↑ Importar CSV
        </button>
        <a href="{{ route('lotes.create') }}" class="btn btn-primary">+ Nuevo Lote</a>
    </div>
</div>

{{-- Modal importar --}}
<div class="modal fade" id="modalImportar" tabindex="-1" aria-labelledby="modalImportarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('lotes.importar') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImportarLabel">Importar Lotes desde CSV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted small">
                        Use la plantilla descargable para llenar los datos. El archivo debe estar en formato CSV
                        con separador <strong>punto y coma (;)</strong> o coma. Los lotes duplicados serán omitidos.
                    </p>
                    <div class="mb-3">
                        <label for="archivo" class="form-label fw-semibold">Archivo CSV</label>
                        <input type="file" class="form-control @error('archivo') is-invalid @enderror"
                               id="archivo" name="archivo" accept=".csv,.txt">
                        @error('archivo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="alert alert-info small mb-0">
                        <strong>Columnas esperadas:</strong> lote, insumo, presentacion, fecha_vencimiento (AAAA-MM-DD), laboratorio, saldo, estado (Activo/Inactivo), observacion
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Importar</button>
                </div>
            </form>
        </div>
    </div>
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
