@extends('layouts.app')
@section('title', 'Insumo')
@section('content')
<h4>{{ $insumo->nombre }}</h4>
<a href="{{ route('insumos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
