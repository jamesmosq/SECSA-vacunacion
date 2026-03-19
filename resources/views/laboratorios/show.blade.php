@extends('layouts.app')
@section('title', 'Laboratorio')
@section('content')
<h4>{{ $laboratorio->nombre }}</h4>
<a href="{{ route('laboratorios.index') }}" class="btn btn-secondary">Volver</a>
@endsection
