@extends('layouts.app')
@section('title', 'Laboratorio COVID')
@section('content')
<h4><span class="badge bg-danger me-2">COVID</span>{{ $laboratorio->nombre }}</h4>
<a href="{{ route('laboratorios-covid.index') }}" class="btn btn-secondary">Volver</a>
@endsection
