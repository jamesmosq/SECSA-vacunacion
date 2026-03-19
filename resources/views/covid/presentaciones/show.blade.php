@extends('layouts.app')
@section('title', 'Presentación COVID')
@section('content')
<h4><span class="badge bg-danger me-2">COVID</span>{{ $presentacion->descripcion }}</h4>
<a href="{{ route('presentaciones-covid.index') }}" class="btn btn-secondary">Volver</a>
@endsection
