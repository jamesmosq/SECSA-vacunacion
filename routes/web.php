<?php

use App\Http\Controllers\Admin\ConfiguracionController as AdminConfiguracionController;
use App\Http\Controllers\Admin\UsuarioController as AdminUsuarioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InstitucionCovidController;
use App\Http\Controllers\InsumoCovidController;
use App\Http\Controllers\LaboratorioCovidController;
use App\Http\Controllers\LoteCovidController;
use App\Http\Controllers\MovimientoCovidController;
use App\Http\Controllers\PedidoCovidController;
use App\Http\Controllers\PresentacionCovidController;
use App\Http\Controllers\ReporteCovidController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', [LoginController::class, 'selectTipo'])->name('login');
Route::post('/tipo', [LoginController::class, 'showLoginForm'])->name('login.tipo');
Route::get('/tipo', [LoginController::class, 'loginFormGet'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {

    Route::get('/principal', [DashboardController::class, 'index'])->name('principal');

    // Tablas maestras PAI
    Route::get('/lotes/plantilla', [LoteController::class, 'plantilla'])->name('lotes.plantilla');
    Route::post('/lotes/importar', [LoteController::class, 'importar'])->name('lotes.importar');
    Route::resource('lotes', LoteController::class);
    Route::resource('movimientos', MovimientoController::class);
    Route::post('/movimientos/por-institucion', [MovimientoController::class, 'byInstitucion'])->name('movimientos.por-institucion');
    Route::resource('instituciones', InstitucionController::class);
    Route::resource('insumos', InsumoController::class);
    Route::resource('laboratorios', LaboratorioController::class);
    Route::resource('presentaciones', PresentacionController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::resource('carnets', CarnetController::class);

    // Reportes PAI
    Route::get('/reportes/saldo-inventario', [ReporteController::class, 'saldoInventario'])->name('reportes.saldo-inventario');
    Route::match(['get', 'post'], '/reportes/institucion-fecha', [ReporteController::class, 'institucionFecha'])->name('reportes.institucion-fecha');
    Route::match(['get', 'post'], '/reportes/institucion-pedido', [ReporteController::class, 'institucionPedido'])->name('reportes.institucion-pedido');
    Route::match(['get', 'post'], '/reportes/institucion-periodo', [ReporteController::class, 'institucionPeriodo'])->name('reportes.institucion-periodo');
    Route::match(['get', 'post'], '/reportes/periodo', [ReporteController::class, 'periodo'])->name('reportes.periodo');
    Route::match(['get', 'post'], '/reportes/insumo-periodo', [ReporteController::class, 'insumoPeriodo'])->name('reportes.insumo-periodo');
    Route::get('/cohorte', [ReporteController::class, 'cohorte'])->name('cohorte');
    Route::get('/estadistica', [ReporteController::class, 'estadistica'])->name('estadistica');

    // Tablas maestras COVID
    Route::resource('lotes-covid', LoteCovidController::class);
    Route::resource('movimientos-covid', MovimientoCovidController::class);
    Route::post('/movimientos-covid/por-institucion', [MovimientoCovidController::class, 'byInstitucion'])->name('movimientos-covid.por-institucion');
    Route::resource('instituciones-covid', InstitucionCovidController::class);
    Route::resource('insumos-covid', InsumoCovidController::class);
    Route::resource('laboratorios-covid', LaboratorioCovidController::class);
    Route::resource('presentaciones-covid', PresentacionCovidController::class);
    Route::resource('pedidos-covid', PedidoCovidController::class);

    // ── Panel Administrador ──────────────────────────────────────────────
    Route::middleware('esAdmin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('usuarios', AdminUsuarioController::class)->except(['show']);
        Route::post('usuarios/{usuario}/reset-password', [AdminUsuarioController::class, 'resetPassword'])
            ->name('usuarios.reset-password');
        Route::get('configuracion',  [AdminConfiguracionController::class, 'edit'])->name('configuracion');
        Route::post('configuracion', [AdminConfiguracionController::class, 'update'])->name('configuracion.update');
    });

    // Reportes COVID
    Route::get('/reportes/covid/saldo-inventario', [ReporteCovidController::class, 'saldoInventario'])->name('reportes.covid.saldo-inventario');
    Route::match(['get', 'post'], '/reportes/covid/institucion-fecha', [ReporteCovidController::class, 'institucionFecha'])->name('reportes.covid.institucion-fecha');
    Route::match(['get', 'post'], '/reportes/covid/institucion-pedido', [ReporteCovidController::class, 'institucionPedido'])->name('reportes.covid.institucion-pedido');
    Route::match(['get', 'post'], '/reportes/covid/institucion-periodo', [ReporteCovidController::class, 'institucionPeriodo'])->name('reportes.covid.institucion-periodo');
    Route::match(['get', 'post'], '/reportes/covid/periodo', [ReporteCovidController::class, 'periodo'])->name('reportes.covid.periodo');
    Route::match(['get', 'post'], '/reportes/covid/insumo-periodo', [ReporteCovidController::class, 'insumoPeriodo'])->name('reportes.covid.insumo-periodo');
});
