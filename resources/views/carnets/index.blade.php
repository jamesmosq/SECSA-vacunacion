@extends('layouts.app')
@section('title', 'Carnets FA y SR')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Carnets de Vacunación (FA y SR)</h4>
    <a href="{{ route('carnets.create') }}" class="btn btn-primary">+ Nuevo Carnet</a>
</div>
<table class="table table-sm table-bordered table-hover">
    <thead class="table-dark"><tr><th>#</th><th>Fecha</th><th>Tipo ID</th><th>Nro ID</th><th>Nombres</th><th>Persona Expide</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($carnets as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->fecha->format('d/m/Y') }}</td>
            <td>{{ $c->tipo_id }}</td>
            <td>{{ $c->numero_id }}</td>
            <td>{{ $c->nombres }}</td>
            <td>{{ $c->persona_expide }}</td>
            <td>
                <a href="{{ route('carnets.show', $c) }}" class="btn btn-sm btn-info">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $carnets->links() }}
@endsection
