@extends('layouts.app')
@section('title', 'Institución COVID')
@section('content')
<h4><span class="badge bg-danger me-2">COVID</span>{{ $institucion->nombre_institucion }}</h4>
<a href="{{ route('instituciones-covid.index') }}" class="btn btn-secondary">Volver</a>
@endsection
