@extends('layouts.auth')
@section('title', 'Tipo de Usuario')
@section('content')

<p class="login-box-msg">Seleccione su tipo de usuario</p>

<form method="POST" action="{{ route('login.tipo') }}">
    @csrf
    <div class="input-group mb-3">
        <select name="tipo" class="form-control" required>
            <option value="">-- Seleccionar --</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo }}">{{ $tipo }}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-users"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-arrow-right mr-1"></i>Ingresar
            </button>
        </div>
    </div>
</form>

@endsection