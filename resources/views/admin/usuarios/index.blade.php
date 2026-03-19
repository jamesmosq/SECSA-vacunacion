@extends('layouts.app')
@section('title', 'Gestión de Usuarios')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header d-flex align-items-center">
        <h3 class="card-title"><i class="fas fa-users-cog mr-2"></i>Usuarios del sistema</h3>
        <div class="ms-auto">
            <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-user-plus mr-1"></i>Nuevo usuario
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover table-sm mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Login</th>
                    <th>Tipo</th>
                    <th>Creado</th>
                    <th class="text-end" style="width:210px">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $u)
                <tr>
                    <td class="align-middle"><i class="fas fa-user text-muted mr-1"></i>{{ $u->login }}</td>
                    <td class="align-middle">
                        @if($u->tipo === 'Administrador')
                            <span class="badge bg-danger">{{ $u->tipo }}</span>
                        @elseif($u->tipo === 'General')
                            <span class="badge bg-primary">{{ $u->tipo }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $u->tipo }}</span>
                        @endif
                    </td>
                    <td class="align-middle text-muted small">{{ $u->created_at?->format('d/m/Y') }}</td>
                    <td class="align-middle text-end">
                        <a href="{{ route('admin.usuarios.edit', $u) }}"
                           class="btn btn-xs btn-warning" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-xs btn-info btn-reset-pwd"
                                data-user-id="{{ $u->id }}"
                                data-user-login="{{ $u->login }}"
                                title="Restablecer contraseña">
                            <i class="fas fa-key"></i>
                        </button>
                        @if($u->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.usuarios.destroy', $u) }}"
                              class="d-inline"
                              data-confirm="¿Eliminar al usuario '{{ $u->login }}'? Se borrarán también sus permisos.">
                            @csrf @method('DELETE')
                            <button class="btn btn-xs btn-danger" title="Eliminar">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @else
                        <button class="btn btn-xs btn-danger" disabled title="No puede eliminar su propia cuenta">
                            <i class="fas fa-trash"></i>
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center text-muted py-3">No hay usuarios registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal: Restablecer contraseña --}}
<div class="modal fade" id="modalResetPwd" tabindex="-1" role="dialog" aria-labelledby="modalResetPwdLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="modalResetPwdLabel">
                    <i class="fas fa-key mr-1"></i>Restablecer contraseña
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="formResetPwd" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <p class="mb-3">
                        Usuario: <strong id="resetLoginLabel"></strong>
                    </p>
                    <div class="form-group">
                        <label class="form-label">Nueva contraseña</label>
                        <input type="password" name="password" class="form-control" required
                               placeholder="Mínimo 8 caracteres">
                    </div>
                    <div class="form-group mb-0">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm text-white">
                        <i class="fas fa-save mr-1"></i>Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).on('click', '.btn-reset-pwd', function () {
    var userId   = $(this).data('user-id');
    var userLogin = $(this).data('user-login');
    $('#resetLoginLabel').text(userLogin);
    $('#formResetPwd').attr('action', '/admin/usuarios/' + userId + '/reset-password');
    $('#formResetPwd input[type=password]').val('');
    $('#modalResetPwd').modal('show');
});
</script>
@endpush
