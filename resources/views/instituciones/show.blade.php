@extends('layouts.app')
@section('title', 'Institución')
@section('content')
<h4>{{ $institucion->nombre_institucion }}</h4>
<table class="table table-sm">
    <tr><th>Código</th><td>{{ $institucion->codigo_habilitacion }}</td></tr>
    <tr><th>Estado</th><td>{{ $institucion->estado }}</td></tr>
</table>
<a href="{{ route('instituciones.index') }}" class="btn btn-secondary">Volver</a>
@endsection
