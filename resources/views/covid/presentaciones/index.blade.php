@extends('layouts.app')
@section('title', 'Presentaciones COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>Presentaciones</h4>
    <a href="{{ route('presentaciones-covid.create') }}" class="btn btn-danger">+ Nueva</a>
</div>
<table class="table table-sm table-bordered">
    <thead class="table-danger"><tr><th>#</th><th>Descripción</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($presentaciones as $pres)
        <tr>
            <td>{{ $pres->id }}</td>
            <td>{{ $pres->descripcion }}</td>
            <td>
                <a href="{{ route('presentaciones-covid.edit', $pres) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('presentaciones-covid.destroy', $pres) }}" class="d-inline" data-confirm="¿Eliminar la presentación COVID «{{ $pres->descripcion }}»?">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $presentaciones->links() }}
@endsection
