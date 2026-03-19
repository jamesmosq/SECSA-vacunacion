@extends('layouts.app')
@section('title', 'Laboratorios COVID')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4><span class="badge bg-danger me-2">COVID</span>Laboratorios</h4>
    <a href="{{ route('laboratorios-covid.create') }}" class="btn btn-danger">+ Nuevo</a>
</div>
<table class="table table-sm table-bordered">
    <thead class="table-danger"><tr><th>#</th><th>Nombre</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($laboratorios as $lab)
        <tr>
            <td>{{ $lab->id }}</td>
            <td>{{ $lab->nombre }}</td>
            <td>
                <a href="{{ route('laboratorios-covid.edit', $lab) }}" class="btn btn-sm btn-warning">Editar</a>
                <form method="POST" action="{{ route('laboratorios-covid.destroy', $lab) }}" class="d-inline" data-confirm="¿Eliminar el laboratorio COVID «{{ $lab->nombre }}»?">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $laboratorios->links() }}
@endsection
