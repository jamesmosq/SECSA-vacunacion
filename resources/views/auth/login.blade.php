@extends('layouts.auth')
@section('title', 'Autenticación')
@section('content')

<p class="login-box-msg">AUTENTICACIÓN DE USUARIOS</p>

<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <input type="hidden" name="tipo" value="{{ $tipo }}">
    {{-- Honeypot antibot: debe permanecer vacío --}}
    <div style="display:none !important" aria-hidden="true" tabindex="-1">
        <input type="text" name="_hp" value="" autocomplete="off" tabindex="-1">
    </div>

    <div class="input-group mb-3">
        <select name="login" class="form-control" required>
            @foreach($usuarios as $u)
                <option value="{{ $u }}" {{ old('login') == $u ? 'selected' : '' }}>{{ $u }}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Contraseña" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="row">
        <div class="col-8">
            <a href="{{ route('login') }}" class="btn btn-secondary btn-block">
                <i class="fas fa-arrow-left mr-1"></i>Volver
            </a>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fas fa-sign-in-alt mr-1"></i>Entrar
            </button>
        </div>
    </div>
</form>

@endsection
