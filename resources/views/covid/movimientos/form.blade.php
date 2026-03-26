@extends('layouts.app')
@section('title', isset($movimiento) ? 'Editar Movimiento COVID' : 'Nuevo Movimiento COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>{{ isset($movimiento) ? 'Editar Movimiento #'.$movimiento->id : 'Nuevo Movimiento' }}</h4>
    <a href="{{ route('movimientos-covid.index') }}" class="btn btn-secondary">Volver</a>
</div>

<div class="card border-danger">
    <div class="card-body">
        <form method="POST" action="{{ isset($movimiento) ? route('movimientos-covid.update', $movimiento) : route('movimientos-covid.store') }}" id="form-movimiento">
            @csrf
            @if(isset($movimiento)) @method('PUT') @endif

            {{-- Cabecera común --}}
            <div class="row g-3 mb-3">
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

                <div class="col-md-12">
                    <label class="form-label">Observaciones</label>
                    <textarea name="observaciones" class="form-control" rows="2">{{ old('observaciones', $movimiento->observaciones ?? '') }}</textarea>
                </div>

                <div class="col-12"><hr><p class="text-muted small mb-0">Datos del paciente (opcional)</p></div>

                <div class="col-md-3">
                    <label class="form-label">Tipo Identificación</label>
                    <input type="text" name="tipo_identificacion" class="form-control" maxlength="30"
                           value="{{ old('tipo_identificacion', $movimiento->tipo_identificacion ?? '') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Identificación</label>
                    <input type="text" name="identificacion" class="form-control" maxlength="30"
                           value="{{ old('identificacion', $movimiento->identificacion ?? '') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Nombres y Apellidos</label>
                    <input type="text" name="nombres_apellidos" class="form-control" maxlength="200"
                           value="{{ old('nombres_apellidos', $movimiento->nombres_apellidos ?? '') }}">
                </div>
            </div>

            {{-- Tabla de insumos/lotes --}}
            <hr>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>Insumos y lotes</strong>
                @if(!isset($movimiento))
                <button type="button" class="btn btn-sm btn-outline-danger" id="btn-agregar">+ Agregar insumo</button>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle" id="tabla-items">
                    <thead class="table-light">
                        <tr>
                            <th style="min-width:220px">Insumo *</th>
                            <th style="min-width:200px">Lote *</th>
                            <th style="width:110px">Ingreso *</th>
                            <th style="width:110px">Salida *</th>
                            @if(!isset($movimiento))<th style="width:50px"></th>@endif
                        </tr>
                    </thead>
                    <tbody id="tbody-items">
                        @if(isset($movimiento))
                            {{-- Edición: fila fija --}}
                            <tr>
                                <td>
                                    <select class="form-select form-select-sm sel-insumo">
                                        <option value="">-- Insumo --</option>
                                        @foreach($lotesPorInsumo as $insumo => $ls)
                                            <option value="{{ $insumo }}" {{ ($movimiento->loteRelacion->insumo ?? '') == $insumo ? 'selected' : '' }}>{{ $insumo }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="items[0][lote]" class="form-select form-select-sm sel-lote" required>
                                        <option value="">-- Lote --</option>
                                        @foreach($lotesPorInsumo as $insumo => $ls)
                                            @foreach($ls as $l)
                                                <option value="{{ $l->lote }}" data-insumo="{{ $insumo }}"
                                                    {{ $movimiento->lote == $l->lote ? 'selected' : '' }}>
                                                    {{ $l->lote }} (Saldo: {{ $l->saldo }})
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="items[0][ingreso]" class="form-control form-control-sm" min="0" value="{{ $movimiento->ingreso }}" required></td>
                                <td><input type="number" name="items[0][salida]" class="form-control form-control-sm" min="0" value="{{ $movimiento->salida }}" required></td>
                            </tr>
                        @else
                            {{-- Creación: primera fila vacía --}}
                            <tr data-idx="0">
                                <td>
                                    <select class="form-select form-select-sm sel-insumo">
                                        <option value="">-- Insumo --</option>
                                        @foreach($lotesPorInsumo as $insumo => $ls)
                                            <option value="{{ $insumo }}">{{ $insumo }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="items[0][lote]" class="form-select form-select-sm sel-lote" required>
                                        <option value="">-- Seleccione insumo primero --</option>
                                        @foreach($lotesPorInsumo as $insumo => $ls)
                                            @foreach($ls as $l)
                                                <option value="{{ $l->lote }}" data-insumo="{{ $insumo }}" style="display:none" disabled>
                                                    {{ $l->lote }} (Saldo: {{ $l->saldo }})
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" name="items[0][ingreso]" class="form-control form-control-sm" min="0" value="0" required></td>
                                <td><input type="number" name="items[0][salida]" class="form-control form-control-sm" min="0" value="0" required></td>
                                <td><button type="button" class="btn btn-sm btn-outline-danger btn-quitar" style="display:none">✕</button></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger">
                    {{ isset($movimiento) ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Datos de lotes para JS --}}
<script id="datos-lotes" type="application/json">
@json($lotesPorInsumo->map(fn($ls) => $ls->map(fn($l) => ['lote' => $l->lote, 'saldo' => $l->saldo])))
</script>

@push('scripts')
<script>
(function () {
    const lotesData = JSON.parse(document.getElementById('datos-lotes').textContent);
    let idx = 1;

    function filtrarLotes(selInsumo, selLote) {
        const insumo = selInsumo.value;
        const opciones = selLote.querySelectorAll('option[data-insumo]');
        selLote.value = '';
        opciones.forEach(opt => {
            const ok = opt.dataset.insumo === insumo;
            opt.style.display = ok ? '' : 'none';
            opt.disabled = !ok;
        });
        const visibles = [...opciones].filter(o => o.dataset.insumo === insumo);
        if (visibles.length === 1) selLote.value = visibles[0].value;
    }

    function bindFila(fila) {
        const selInsumo = fila.querySelector('.sel-insumo');
        const selLote   = fila.querySelector('.sel-lote');
        selInsumo.addEventListener('change', () => filtrarLotes(selInsumo, selLote));
        if (selInsumo.value) filtrarLotes(selInsumo, selLote);

        const btnQuitar = fila.querySelector('.btn-quitar');
        if (btnQuitar) {
            btnQuitar.addEventListener('click', () => {
                fila.remove();
                actualizarBotonesQuitar();
            });
        }
    }

    function actualizarBotonesQuitar() {
        const filas = document.querySelectorAll('#tbody-items tr');
        filas.forEach(f => {
            const btn = f.querySelector('.btn-quitar');
            if (btn) btn.style.display = filas.length > 1 ? '' : 'none';
        });
    }

    function crearFila() {
        const opcionesInsumo = Object.keys(lotesData).map(ins =>
            `<option value="${ins}">${ins}</option>`
        ).join('');

        const opcionesLote = Object.entries(lotesData).flatMap(([ins, lotes]) =>
            lotes.map(l =>
                `<option value="${l.lote}" data-insumo="${ins}" style="display:none" disabled>${l.lote} (Saldo: ${l.saldo})</option>`
            )
        ).join('');

        const tr = document.createElement('tr');
        tr.dataset.idx = idx;
        tr.innerHTML = `
            <td>
                <select class="form-select form-select-sm sel-insumo">
                    <option value="">-- Insumo --</option>
                    ${opcionesInsumo}
                </select>
            </td>
            <td>
                <select name="items[${idx}][lote]" class="form-select form-select-sm sel-lote" required>
                    <option value="">-- Seleccione insumo primero --</option>
                    ${opcionesLote}
                </select>
            </td>
            <td><input type="number" name="items[${idx}][ingreso]" class="form-control form-control-sm" min="0" value="0" required></td>
            <td><input type="number" name="items[${idx}][salida]" class="form-control form-control-sm" min="0" value="0" required></td>
            <td><button type="button" class="btn btn-sm btn-outline-danger btn-quitar">✕</button></td>
        `;
        idx++;
        return tr;
    }

    document.querySelectorAll('#tbody-items tr').forEach(bindFila);

    const btnAgregar = document.getElementById('btn-agregar');
    if (btnAgregar) {
        btnAgregar.addEventListener('click', () => {
            const fila = crearFila();
            document.getElementById('tbody-items').appendChild(fila);
            bindFila(fila);
            actualizarBotonesQuitar();
        });
    }
})();
</script>
@endpush
@endsection
