@extends('layouts.app')
@section('title', 'Insumos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Insumos / Vacunas</h4>
    <a href="{{ route('insumos.create') }}" class="btn btn-primary">+ Nuevo</a>
</div>
<table class="table table-sm table-bordered">
    <thead class="table-dark"><tr><th>#</th><th>Nombre</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($insumos as $ins)
        <tr>
            <td>{{ $ins->id }}</td>
            <td>{{ $ins->nombre }}</td>
            <td>
                <a href="{{ route('insumos.edit', $ins) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('insumos.destroy', $ins) }}" class="d-inline" data-confirm="¿Eliminar el insumo «{{ $ins->nombre }}»?">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $insumos->links() }}
@endsection
