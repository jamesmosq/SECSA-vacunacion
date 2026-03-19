<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdministrador
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->tipo === 'Administrador') {
            return $next($request);
        }

        abort(403, 'Acceso restringido al administrador del sistema.');
    }
}
