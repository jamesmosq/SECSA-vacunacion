@extends('layouts.app')
@section('title', 'Presentación')
@section('content')
<h4>{{ $presentacion->descripcion }}</h4>
<a href="{{ route('presentaciones.index') }}" class="btn btn-secondary">Volver</a>
@endsection
