@extends('layouts.app')
@section('title', 'Carnet de Vacunación')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div></div>
    <button onclick="window.print()" class="btn btn-outline-secondary">Imprimir</button>
</div>

<div class="card mx-auto" style="max-width:600px" id="carnet-print">
    <div class="card-body p-4">
        <div class="text-center mb-3">
            <strong>MUNICIPIO DE ENVIGADO</strong><br>
            <strong>SECRETARÍA DE SALUD</strong><br>
            <strong>PROGRAMA DE VACUNACIÓN</strong>
        </div>
        <hr>
        <p class="text-justify">
            La Secretaría de Salud del Municipio de Envigado certifica que el/la señor(a)
            <strong>{{ $carnet->nombres }}</strong>, identificado(a) con
            <strong>{{ $carnet->tipo_id }} No. {{ $carnet->numero_id }}</strong>
            expedida en <strong>{{ $carnet->expedicion_id }}</strong>,
            <strong>NO ES APTA</strong> para recibir la Vacuna contra la Fiebre Amarilla (FA)
            y/o la Vacuna contra el Sarampión y la Rubéola (SR) por presentar riesgo elevado
            de Efectos Adversos Supuestamente Atribuidos a la Vacunación o Inmunización (ESAVI).
        </p>
        <hr>
        <div class="row">
            <div class="col-6">
                <p><strong>Fecha de expedición:</strong><br>{{ $carnet->fecha->format('d/m/Y') }}</p>
            </div>
            <div class="col-6 text-end">
                <p><strong>Persona que expide:</strong><br>{{ $carnet->persona_expide }}</p>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3">
    <a href="{{ route('carnets.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('carnets.edit', $carnet) }}" class="btn btn-warning">Editar</a>
</div>

@push('scripts')
<style>
@media print {
    nav, .btn, .navbar { display: none !important; }
    #carnet-print { max-width: 100% !important; border: none !important; }
}
</style>
@endpush
@endsection
