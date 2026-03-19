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
                ['opcion' => '-----------TABLAS MAESTRAS ----------------',          'pagina' => '',                               'orden' => 100],
                ['opcion' => 'LOTE',                                                 'pagina' => 'lotes',                          'orden' => 1],
                ['opcion' => 'MOVIMIENTO',                                           'pagina' => 'movimientos',                    'orden' => 2],
                ['opcion' => 'INFORME POR INSTITUCION Y FECHA ENTREGA',              'pagina' => 'reportes/institucion-fecha',      'orden' => 3],
                ['opcion' => 'INFORME POR INSTITUCION Y PEDIDO',                     'pagina' => 'reportes/institucion-pedido',     'orden' => 4],
                ['opcion' => 'INFORME POR INSTITUCION POR PERIODO',                  'pagina' => 'reportes/institucion-periodo',    'orden' => 5],
                ['opcion' => 'INFORME POR PERIODO',                                  'pagina' => 'reportes/periodo',               'orden' => 6],
                ['opcion' => 'INFORME POR INSUMO Y PERIODO',                         'pagina' => 'reportes/insumo-periodo',        'orden' => 7],
                ['opcion' => 'INGRESA RADICADO PAIWEB',                              'pagina' => 'pedidos',                        'orden' => 8],
                ['opcion' => 'SALDO DE INVENTARIO',                                  'pagina' => 'reportes/saldo-inventario',      'orden' => 9],
                ['opcion' => 'INSTITUCION',                                          'pagina' => 'instituciones',                  'orden' => 101],
                ['opcion' => 'INSUMO',                                               'pagina' => 'insumos',                        'orden' => 102],
                ['opcion' => 'LABORATORIO',                                          'pagina' => 'laboratorios',                   'orden' => 103],
                ['opcion' => 'PRESENTACION',                                         'pagina' => 'presentaciones',                 'orden' => 104],
                ['opcion' => '-----------SEGUIMIENTO A LA COHORTE ----------------', 'pagina' => '',                               'orden' => 200],
                ['opcion' => 'Informe Cohortes',                                     'pagina' => 'cohorte',                        'orden' => 201],
                ['opcion' => '---------- INDICADORES ----------------',              'pagina' => '',                               'orden' => 250],
                ['opcion' => 'ESTADISTICA DE INDICADORES',                           'pagina' => 'estadistica',                    'orden' => 251],
                ['opcion' => '-----------CARNET FIEBRE AMARILLA Y SR ----------------','pagina' => '',                             'orden' => 300],
                ['opcion' => 'Carnet FA y SR',                                       'pagina' => 'carnets/crear',                  'orden' => 301],
                ['opcion' => '-----------COVID ----------------',                     'pagina' => '',                               'orden' => 500],
                ['opcion' => 'LOTE COVID',                                           'pagina' => 'lotes-covid',                    'orden' => 501],
                ['opcion' => 'INSTITUCION COVID',                                    'pagina' => 'instituciones-covid',            'orden' => 502],
                ['opcion' => 'INSUMO COVID',                                         'pagina' => 'insumos-covid',                  'orden' => 503],
                ['opcion' => 'LABORATORIO COVID',                                    'pagina' => 'laboratorios-covid',             'orden' => 504],
                ['opcion' => 'PRESENTACION COVID',                                   'pagina' => 'presentaciones-covid',           'orden' => 505],
                ['opcion' => 'MOVIMIENTO COVID',                                     'pagina' => 'movimientos-covid',              'orden' => 506],
                ['opcion' => 'INFORME POR INSTITUCION Y FECHA ENTREGA COVID',        'pagina' => 'reportes/covid/institucion-fecha',  'orden' => 507],
                ['opcion' => 'INFORME POR INSTITUCION Y PEDIDO COVID',               'pagina' => 'reportes/covid/institucion-pedido', 'orden' => 508],
                ['opcion' => 'INFORME POR INSTITUCION POR PERIODO COVID',            'pagina' => 'reportes/covid/institucion-periodo','orden' => 509],
                ['opcion' => 'INFORME POR PERIODO COVID',                            'pagina' => 'reportes/covid/periodo',         'orden' => 510],
                ['opcion' => 'INFORME POR INSUMO Y PERIODO COVID',                   'pagina' => 'reportes/covid/insumo-periodo',  'orden' => 511],
                ['opcion' => 'INGRESA RADICADO PAIWEB COVID',                        'pagina' => 'pedidos-covid',                  'orden' => 512],
                ['opcion' => 'SALDO DE INVENTARIO COVID',                            'pagina' => 'reportes/covid/saldo-inventario','orden' => 513],
            ],
            'General' => [
                ['opcion' => '-----------SEGUIMIENTO A LA COHORTE ----------------', 'pagina' => '',            'orden' => 200],
                ['opcion' => 'Informe Cohortes',                                     'pagina' => 'cohorte',     'orden' => 201],
                ['opcion' => '---------- INDICADORES ----------------',              'pagina' => '',            'orden' => 250],
                ['opcion' => 'ESTADISTICA DE INDICADORES',                           'pagina' => 'estadistica', 'orden' => 251],
                ['opcion' => '-----------CARNET FIEBRE AMARILLA Y SR ----------------','pagina' => '',          'orden' => 300],
                ['opcion' => 'Carnet FA y SR',                                       'pagina' => 'carnets/crear','orden' => 301],
            ],
            'Consulta' => [
                ['opcion' => '---------- INDICADORES ----------------', 'pagina' => '',            'orden' => 250],
                ['opcion' => 'ESTADISTICA DE INDICADORES',              'pagina' => 'estadistica', 'orden' => 251],
            ],
            default => [],
        };
    }
}
