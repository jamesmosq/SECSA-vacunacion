@extends('layouts.app')
@section('title', 'Informe Cohortes')
@section('content')
<h4 class="mb-3">Seguimiento a la Cohorte</h4>
<p class="text-muted">Panel de indicadores de cohortes de vacunación.</p>
<div class="ratio ratio-16x9">
    <iframe src="https://app.powerbi.com/view" frameborder="0" allowfullscreen></iframe>
</div>
@endsection
