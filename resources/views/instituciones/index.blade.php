@extends('layouts.app')
@section('title', 'Instituciones')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Instituciones</h4>
    <a href="{{ route('instituciones.create') }}" class="btn btn-primary">+ Nueva</a>
</div>
<table class="table table-sm table-bordered table-hover">
    <thead class="table-dark"><tr><th>Código</th><th>Nombre</th><th>Estado</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($instituciones as $inst)
        <tr>
            <td>{{ $inst->codigo_habilitacion }}</td>
            <td>{{ $inst->nombre_institucion }}</td>
            <td><span class="badge {{ $inst->estado === 'Activo' ? 'bg-success' : 'bg-secondary' }}">{{ $inst->estado }}</span></td>
            <td>
                <a href="{{ route('instituciones.edit', $inst) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('instituciones.destroy', $inst) }}" class="d-inline" data-confirm="¿Eliminar la institución «{{ $inst->nombre_institucion }}»?">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $instituciones->links() }}
@endsection
