<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Confiar en el proxy de Railway (termina SSL antes del contenedor)
        $middleware->trustProxies(at: '*');

        // Aplica headers de seguridad a todas las respuestas web
        $middleware->web(append: [
            \App\Http\Middleware\SecurityHeaders::class,
        ]);
        // Alias de middleware
        $middleware->alias([
            'esAdmin' => \App\Http\Middleware\EsAdministrador::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
