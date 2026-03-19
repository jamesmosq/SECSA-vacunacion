@extends('layouts.app')
@section('title', 'Insumo COVID')
@section('content')
<h4><span class="badge bg-danger me-2">COVID</span>{{ $insumo->nombre }}</h4>
<a href="{{ route('insumos-covid.index') }}" class="btn btn-secondary">Volver</a>
@endsection
