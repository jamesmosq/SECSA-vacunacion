@extends('layouts.app')
@section('title', 'Menú Principal')
@section('content')

<div class="row">
    <div class="col-12 mb-3">
        <div class="callout callout-info">
            <h5><i class="fas fa-user-circle mr-2"></i>Bienvenido, <strong>{{ auth()->user()->login }}</strong></h5>
            Seleccione una opción del menú lateral o acceda directamente desde aquí.
        </div>
    </div>
</div>

<div class="row">
    @php $currentSection = null; @endphp
    @foreach($opciones as $op)
        @if(empty($op->pagina))
            @if($currentSection !== null)
                </div>{{-- close previous row --}}
            @endif
            <div class="col-12 mt-3 mb-2">
                <h5 class="border-bottom pb-1 text-primary">
                    <i class="fas fa-folder-open mr-1"></i>{{ $op->opcion }}
                </h5>
            </div>
            <div class="row w-100 mx-0">
            @php $currentSection = $op->opcion; @endphp
        @else
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="{{ url($op->pagina) }}" class="btn btn-primary w-100 text-left py-3">
                    <i class="fas fa-chevron-right mr-2"></i>{{ $op->opcion }}
                </a>
            </div>
        @endif
    @endforeach
    @if($currentSection !== null)
        </div>
    @endif
</div>

@endsection