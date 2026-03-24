<?php

namespace App\Providers;

use App\Models\Configuracion;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Route::resourceVerbs([
            'create' => 'crear',
            'edit'   => 'editar',
        ]);

        View::composer('layouts.app', function ($view) {
            $view->with('portalConfig', Configuracion::actual());
        });
    }
}
