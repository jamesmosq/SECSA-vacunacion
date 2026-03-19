@extends('layouts.app')
@section('title', 'Estadísticas de Indicadores')
@section('content')
<h4 class="mb-3">Estadística de Indicadores</h4>
<p class="text-muted">Panel de estadísticas del programa de vacunación.</p>
<div class="ratio ratio-16x9">
    <iframe src="https://app.powerbi.com/view" frameborder="0" allowfullscreen></iframe>
</div>
@endsection
