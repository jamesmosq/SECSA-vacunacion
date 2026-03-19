<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsuarioOpcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsuarioController extends Controller
{
    private const TIPOS = ['Administrador', 'General', 'Consulta'];

    public function index()
    {
        $usuarios = User::orderBy('tipo')->orderBy('login')->get();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create', ['tipos' => self::TIPOS]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'login'                 => 'required|string|max:100|unique:usuarios,login',
            'password'              => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            'tipo'                  => 'required|in:' . implode(',', self::TIPOS),
        ]);

        $user = User::create([
            'login'    => $data['login'],
            'password' => Hash::make($data['password']),
            'tipo'     => $data['tipo'],
        ]);

        $this->asignarOpcionesPorTipo($user->login, $data['tipo']);

        return redirect()->route('admin.usuarios.index')
            ->with('success', "Usuario '{$user->login}' creado correctamente.");
    }

    public function edit(User $usuario)
    {
        return view('admin.usuarios.edit', [
            'usuario' => $usuario,
            'tipos'   => self::TIPOS,
        ]);
    }

    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'login'          => 'required|string|max:100|unique:usuarios,login,' . $usuario->id,
            'tipo'           => 'required|in:' . implode(',', self::TIPOS),
            'reset_permisos' => 'nullable|boolean',
        ]);

        $usuario->update([
            'login' => $data['login'],
            'tipo'  => $data['tipo'],
        ]);

        if (!empty($data['reset_permisos'])) {
            $this->asignarOpcionesPorTipo($data['login'], $data['tipo']);
        }

        return redirect()->route('admin.usuarios.index')
            ->with('success', "Usuario '{$usuario->login}' actualizado correctamente.");
    }

    public function destroy(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return back()->withErrors(['error' => 'No puede eliminar su propia cuenta.']);
        }

        $login = $usuario->login;
        UsuarioOpcion::where('login', $login)->delete();
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')
            ->with('success', "Usuario '{$login}' eliminado.");
    }

    public function resetPassword(Request $request, User $usuario)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $usuario->update(['password' => Hash::make($request->password)]);

        return redirect()->route('admin.usuarios.index')
            ->with('success', "Contraseña de '{$usuario->login}' restablecida correctamente.");
    }

    // ── Permisos por defecto según tipo ──────────────────────────────────

    private function asignarOpcionesPorTipo(string $login, string $tipo): void
    {
        UsuarioOpcion::where('login', $login)->delete();

        $opciones = array_map(
            fn($op) => array_merge($op, ['login' => $login]),
            self::opcionesBase($tipo)
        );

        if (!empty($opciones)) {
            UsuarioOpcion::insert($opciones);
        }
    }

    private static function opcionesBase(string $tipo): array
    {
        return match ($tipo) {
            'Administrador' => [
                // PAI — Inventario
                ['opcion' => 'PAI — Inventario',           'pagina' => '',                              'orden' => 100],
                ['opcion' => 'Lotes',                       'pagina' => 'lotes',                         'orden' => 101],
                ['opcion' => 'Movimientos',                 'pagina' => 'movimientos',                   'orden' => 102],
                ['opcion' => 'Pedidos PAIWEB',              'pagina' => 'pedidos',                       'orden' => 103],
                ['opcion' => 'Saldo de Inventario',         'pagina' => 'reportes/saldo-inventario',     'orden' => 104],
                // PAI — Catálogos
                ['opcion' => 'PAI — Catálogos',            'pagina' => '',                              'orden' => 200],
                ['opcion' => 'Instituciones',               'pagina' => 'instituciones',                 'orden' => 201],
                ['opcion' => 'Insumos',                     'pagina' => 'insumos',                       'orden' => 202],
                ['opcion' => 'Laboratorios',                'pagina' => 'laboratorios',                  'orden' => 203],
                ['opcion' => 'Presentaciones',              'pagina' => 'presentaciones',                'orden' => 204],
                // PAI — Reportes
                ['opcion' => 'PAI — Reportes',             'pagina' => '',                              'orden' => 300],
                ['opcion' => 'Por Institución y Fecha',     'pagina' => 'reportes/institucion-fecha',    'orden' => 301],
                ['opcion' => 'Por Institución y Pedido',    'pagina' => 'reportes/institucion-pedido',   'orden' => 302],
                ['opcion' => 'Por Institución por Periodo', 'pagina' => 'reportes/institucion-periodo',  'orden' => 303],
                ['opcion' => 'Por Periodo',                 'pagina' => 'reportes/periodo',              'orden' => 304],
                ['opcion' => 'Por Insumo y Periodo',        'pagina' => 'reportes/insumo-periodo',       'orden' => 305],
                // Cohorte e Indicadores
                ['opcion' => 'Cohorte e Indicadores',      'pagina' => '',                              'orden' => 400],
                ['opcion' => 'Informe Cohortes',            'pagina' => 'cohorte',                       'orden' => 401],
                ['opcion' => 'Estadística de Indicadores',  'pagina' => 'estadistica',                   'orden' => 402],
                // Carnets
                ['opcion' => 'Carnets',                    'pagina' => '',                              'orden' => 500],
                ['opcion' => 'Carnet FA y SR',              'pagina' => 'carnets/crear',                 'orden' => 501],
                // COVID — Inventario
                ['opcion' => 'COVID — Inventario',         'pagina' => '',                               'orden' => 600],
                ['opcion' => 'Lotes COVID',                 'pagina' => 'lotes-covid',                   'orden' => 601],
                ['opcion' => 'Movimientos COVID',           'pagina' => 'movimientos-covid',             'orden' => 602],
                ['opcion' => 'Pedidos COVID',               'pagina' => 'pedidos-covid',                 'orden' => 603],
                ['opcion' => 'Saldo Inventario COVID',      'pagina' => 'reportes/covid/saldo-inventario','orden' => 604],
                // COVID — Catálogos
                ['opcion' => 'COVID — Catálogos',          'pagina' => '',                               'orden' => 700],
                ['opcion' => 'Instituciones COVID',         'pagina' => 'instituciones-covid',           'orden' => 701],
                ['opcion' => 'Insumos COVID',               'pagina' => 'insumos-covid',                 'orden' => 702],
                ['opcion' => 'Laboratorios COVID',          'pagina' => 'laboratorios-covid',            'orden' => 703],
                ['opcion' => 'Presentaciones COVID',        'pagina' => 'presentaciones-covid',          'orden' => 704],
                // COVID — Reportes
                ['opcion' => 'COVID — Reportes',           'pagina' => '',                                    'orden' => 800],
                ['opcion' => 'Por Institución y Fecha',     'pagina' => 'reportes/covid/institucion-fecha',   'orden' => 801],
                ['opcion' => 'Por Institución y Pedido',    'pagina' => 'reportes/covid/institucion-pedido',  'orden' => 802],
                ['opcion' => 'Por Institución por Periodo', 'pagina' => 'reportes/covid/institucion-periodo', 'orden' => 803],
                ['opcion' => 'Por Periodo',                 'pagina' => 'reportes/covid/periodo',             'orden' => 804],
                ['opcion' => 'Por Insumo y Periodo',        'pagina' => 'reportes/covid/insumo-periodo',      'orden' => 805],
            ],
            'General' => [
                ['opcion' => 'Cohorte e Indicadores',      'pagina' => '',              'orden' => 400],
                ['opcion' => 'Informe Cohortes',            'pagina' => 'cohorte',       'orden' => 401],
                ['opcion' => 'Estadística de Indicadores',  'pagina' => 'estadistica',   'orden' => 402],
                ['opcion' => 'Carnets',                    'pagina' => '',              'orden' => 500],
                ['opcion' => 'Carnet FA y SR',              'pagina' => 'carnets/crear', 'orden' => 501],
            ],
            'Consulta' => [
                ['opcion' => 'Cohorte e Indicadores',      'pagina' => '',            'orden' => 400],
                ['opcion' => 'Estadística de Indicadores',  'pagina' => 'estadistica', 'orden' => 402],
            ],
            default => [],
        };
    }
}
