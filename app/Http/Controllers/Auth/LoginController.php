<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    private const MAX_ATTEMPTS = 5;
    private const LOCKOUT_SECS = 900; // 15 minutos

    // ── Paso 1: selección de tipo de usuario ──────────────────────────────
    public function selectTipo()
    {
        $tipos = User::select('tipo')->distinct()->orderBy('tipo')->pluck('tipo');
        return view('auth.select-tipo', compact('tipos'));
    }

    // ── Paso 2a: POST – recibe el tipo, guarda en sesión y muestra el form ─
    public function showLoginForm(Request $request)
    {
        $request->validate(['tipo' => 'required|string']);

        $tipo     = $request->input('tipo');
        $usuarios = User::where('tipo', $tipo)->orderBy('login')->pluck('login');

        // Persiste datos del paso 2 y marca el momento del renderizado (antibot)
        session([
            '_login_tipo'      => $tipo,
            '_login_usuarios'  => $usuarios->toArray(),
            '_form_rendered_at' => now()->timestamp,
        ]);

        return view('auth.login', compact('tipo', 'usuarios'));
    }

    // ── Paso 2b: GET – recarga el form tras un fallo de login (PRG) ────────
    public function loginFormGet()
    {
        $tipo = session('_login_tipo');

        if (!$tipo) {
            return redirect()->route('login');
        }

        $usuarios = session('_login_usuarios', []);

        return view('auth.login', compact('tipo', 'usuarios'));
    }

    // ── Paso 3: autenticación ─────────────────────────────────────────────
    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string',
        ]);

        // 1. Honeypot: el campo _hp debe llegar vacío; los bots lo rellenan
        if (!empty($request->input('_hp'))) {
            return $this->fakeFail();
        }

        // 2. Timing antibot: mínimo 2 segundos desde que se renderizó el form
        $renderedAt = session('_form_rendered_at', 0);
        if ($renderedAt > 0 && (now()->timestamp - $renderedAt) < 2) {
            return $this->fakeFail();
        }

        // 3. Rate limiting (brute force)
        $throttleKey = $this->throttleKey($request);

        if (RateLimiter::tooManyAttempts($throttleKey, self::MAX_ATTEMPTS)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $minutes = (int) ceil($seconds / 60);
            return redirect()->route('login.form')->withErrors([
                'password' => "Demasiados intentos fallidos. Intente de nuevo en {$minutes} minuto(s).",
            ])->withInput(['login' => $request->login]);
        }

        // 4. Validación de credenciales
        $usuario = User::where('login', $request->login)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            RateLimiter::hit($throttleKey, self::LOCKOUT_SECS);

            $remaining = self::MAX_ATTEMPTS - RateLimiter::attempts($throttleKey);
            $msg       = 'Usuario o contraseña no válidos.';
            if ($remaining > 0 && $remaining <= 2) {
                $msg .= " Le quedan {$remaining} intento(s) antes del bloqueo.";
            }

            return redirect()->route('login.form')->withErrors(['password' => $msg])->withInput(['login' => $request->login]);
        }

        // 5. Login exitoso
        RateLimiter::clear($throttleKey);
        session()->forget('_form_rendered_at');

        Auth::login($usuario);
        $request->session()->regenerate();

        return redirect()->route('principal');
    }

    // ── Cerrar sesión ─────────────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // ── Helpers ───────────────────────────────────────────────────────────

    /** Clave única por IP + usuario para el rate limiter */
    private function throttleKey(Request $request): string
    {
        return 'login|' . $request->ip() . '|' . strtolower($request->input('login', ''));
    }

    /** Respuesta silenciosa cuando se detecta un bot (no revela el motivo real) */
    private function fakeFail()
    {
        return redirect()->route('login.form')->withErrors(['password' => 'Usuario o contraseña no válidos.']);
    }
}
