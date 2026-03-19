# SECSA Vacunación

Sistema de gestión de inventario, movimientos y reportes del Programa Ampliado de Inmunización (PAI) y del Plan de Vacunación COVID-19 de la **Secretaría de Salud — Municipio de Envigado**.

---

## Tabla de contenidos

- [Descripción general](#descripción-general)
- [Tecnologías](#tecnologías)
- [Módulos del sistema](#módulos-del-sistema)
- [Seguridad](#seguridad)
- [Panel de administración](#panel-de-administración)
- [Requisitos previos](#requisitos-previos)
- [Instalación y configuración](#instalación-y-configuración)
- [Ejecución de pruebas](#ejecución-de-pruebas)
- [Estructura del proyecto](#estructura-del-proyecto)

---

## Descripción general

SECSA Vacunación es una aplicación web desarrollada en **Laravel 13** que permite al equipo de vacunación de la Secretaría de Salud de Envigado gestionar de forma centralizada:

- El inventario de biológicos e insumos del PAI (Programa Ampliado de Inmunización).
- El inventario de vacunas y materiales del programa COVID-19.
- Los movimientos de entrada y salida de cada lote por institución.
- Los pedidos (radicados PAIWEB) tanto PAI como COVID.
- Los carnets de vacunación de Fiebre Amarilla y SR.
- Reportes estadísticos e informes por institución, periodo e insumo.
- Un **dashboard** con indicadores en tiempo real y gráficas de tendencias.
- Un **panel de administración** para gestión de usuarios y personalización del portal.

El sistema reemplaza un sistema legado en PHP plano, modernizando la arquitectura, la seguridad y la experiencia de usuario.

---

## Tecnologías

| Capa | Tecnología |
|------|-----------|
| Backend | PHP 8.4 / Laravel 13 |
| Base de datos | PostgreSQL (producción) / SQLite (pruebas) |
| Frontend | AdminLTE 3 (Bootstrap 4) |
| Autenticación | Laravel Auth + Rate Limiting propio |
| Gráficas | Chart.js (incluido en AdminLTE) |
| Alertas / Confirmaciones | SweetAlert2 v11 |
| Pruebas | Pest v4 (52 tests) |
| Servidor de desarrollo | Laravel Herd |

---

## Módulos del sistema

### PAI — Programa Ampliado de Inmunización

| Módulo | Descripción |
|--------|-------------|
| **Lotes** | Registro de lotes de biológicos con código, insumo, laboratorio, presentación, saldo y fecha de vencimiento. |
| **Movimientos** | Ingresos y salidas de inventario por institución. Actualiza el saldo del lote automáticamente. |
| **Instituciones** | Catálogo de instituciones receptoras de biológicos. |
| **Insumos** | Catálogo de biológicos e insumos del PAI. |
| **Laboratorios** | Catálogo de laboratorios y fabricantes. |
| **Presentaciones** | Catálogo de presentaciones (frascos, dosis, ampollas, etc.). |
| **Pedidos** | Registro de radicados PAIWEB. |
| **Carnets** | Generación de carnets de vacunación de Fiebre Amarilla y SR con imagen del certificado. |

### COVID-19

Módulos espejo del PAI para el manejo independiente del inventario COVID:

- Lotes COVID, Movimientos COVID, Instituciones COVID, Insumos COVID, Laboratorios COVID, Presentaciones COVID, Pedidos COVID.

### Reportes PAI

| Reporte | Descripción |
|---------|-------------|
| Saldo de inventario | Saldo actual por insumo y lote. |
| Por institución y fecha | Movimientos filtrados por institución y rango de fechas. |
| Por institución y pedido | Movimientos vinculados a un pedido específico. |
| Por institución y periodo | Resumen mensual por institución. |
| Por periodo | Consolidado de movimientos en un rango de fechas. |
| Por insumo y periodo | Consumo por biológico en un periodo dado. |

Los mismos reportes están disponibles para COVID bajo el prefijo `/reportes/covid/`.

### Dashboard

El dashboard (`/principal`) presenta al usuario autenticado un panel con:

- **Tarjetas de indicadores**: saldo total PAI y COVID, lotes activos, lotes vencidos o próximos a vencer, movimientos del mes, carnets del mes/año/total, pedidos registrados.
- **Gráfica de barras**: ingresos y salidas mensuales del PAI durante el año en curso.
- **Gráfica de dona**: distribución del saldo actual por biológico (top 8).
- **Gráfica de líneas**: comparativo de salidas PAI vs. COVID en los últimos 6 meses.
- **Tabla de lotes próximos a vencer**: lotes que vencen en los próximos 90 días con alerta visual por días restantes.
- **Top instituciones del mes**: instituciones con mayor volumen de salidas en el mes actual.
- **Accesos rápidos**: accesos directos a las secciones habilitadas para el usuario.

---

## Seguridad

El sistema implementa múltiples capas de seguridad:

### Autenticación por pasos

1. El usuario selecciona su **tipo de perfil** (Administrador, General, Consulta).
2. Se presentan únicamente los logins del tipo seleccionado.
3. Ingresa su contraseña.

### Protecciones anti-ataque

| Mecanismo | Descripción |
|-----------|-------------|
| **CSRF** | Tokens CSRF en todos los formularios (estándar de Laravel). |
| **Honeypot antibot** | Campo oculto `_hp` que los bots rellenan; si tiene contenido, la solicitud se rechaza silenciosamente. |
| **Timing antibot** | El formulario registra el momento de renderizado en sesión. Si se envía en menos de 2 segundos, se rechaza (los bots no simulan tiempo de lectura humana). |
| **Rate Limiting** | Máximo 5 intentos fallidos por IP + usuario. Bloqueo de 15 minutos. Advertencia visual cuando quedan ≤ 2 intentos. |
| **Headers de seguridad** | Middleware `SecurityHeaders` aplica en todas las respuestas: `X-Frame-Options`, `X-Content-Type-Options`, `X-XSS-Protection`, `Referrer-Policy`, `Content-Security-Policy`, `Permissions-Policy`. |
| **CSP** | Política de seguridad de contenido que restringe orígenes a `self` y `cdn.jsdelivr.net` (SweetAlert2). |

### Control de acceso por roles

| Tipo | Acceso |
|------|--------|
| **Administrador** | Acceso completo a todos los módulos PAI, COVID, reportes y panel de administración. |
| **General** | Cohortes, indicadores y carnets. |
| **Consulta** | Solo estadística de indicadores. |

Los menús se generan dinámicamente por usuario desde la tabla `usuario_opciones`. El panel de administración está protegido por el middleware `EsAdministrador`, que verifica `tipo = 'Administrador'`.

---

## Panel de administración

Accesible en `/admin/` exclusivamente para el usuario Administrador.

### Gestión de usuarios (`/admin/usuarios`)

- **Listar** todos los usuarios del sistema con su tipo y fecha de creación.
- **Crear** nuevo usuario: login, contraseña (mínimo 8 caracteres con letras y números), tipo. Los permisos del menú se asignan automáticamente según el tipo seleccionado.
- **Editar** usuario: modificar login y tipo. Opción de restablecer permisos al estándar del tipo seleccionado.
- **Restablecer contraseña**: modal de cambio de contraseña directo desde el listado, sin necesidad de conocer la contraseña actual.
- **Eliminar** usuario: elimina el usuario y todos sus permisos. No permite eliminar la propia cuenta activa del administrador.

### Configuración del portal (`/admin/configuracion`)

- **Título del portal**: personalizable; se muestra en la barra de navegación, en el sidebar y en el `<title>` de todas las páginas.
- **Logo del portal**: carga de imagen (JPG, PNG, GIF, SVG, WebP, máx. 2 MB). Se muestra en la cabecera del sidebar reemplazando el ícono por defecto. Incluye preview del logo actual y opción de eliminarlo.

---

## Requisitos previos

- PHP 8.2 o superior (recomendado 8.4)
- Composer 2.x
- PostgreSQL 14+ (producción) o SQLite (desarrollo / pruebas)
- Laravel Herd u otro servidor compatible (Apache, Nginx)

---

## Instalación y configuración

### 1. Clonar el repositorio

```bash
git clone https://github.com/jamesmosq/SECSA-vacunacion.git
cd SECSA-vacunacion
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar `.env` con los datos de conexión:

```env
# PostgreSQL (producción)
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=secsavacunacion
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

# SQLite (desarrollo local)
# DB_CONNECTION=sqlite
# DB_DATABASE=/ruta/absoluta/database/database.sqlite
```

### 4. Ejecutar migraciones y seeders

```bash
php artisan migrate
php artisan db:seed
```

Los seeders crean los usuarios iniciales y los catálogos base (insumos, laboratorios, presentaciones, instituciones).

**Usuarios por defecto:**

| Login | Contraseña | Tipo |
|-------|-----------|------|
| Administrador | Admin123* | Administrador |
| General | vacunacion123* | General |
| Consulta | Consulta | Consulta |

> **Importante:** cambiar las contraseñas por defecto desde el panel de administración antes de desplegar en producción.

### 5. Enlace de almacenamiento público (logos)

```bash
php artisan storage:link
```

### 6. Publicar assets de AdminLTE

```bash
php artisan adminlte:install --only=assets
```

---

## Ejecución de pruebas

El proyecto cuenta con **52 pruebas de integración** organizadas por módulo. Todas usan SQLite en memoria para aislamiento total del entorno de producción.

```bash
php artisan test
```

| Archivo de pruebas | Cobertura | Tests |
|-------------------|-----------|-------|
| `AuthTest.php` | Login por pasos, CSRF, honeypot, timing antibot, rate limiting (bloqueo y advertencia), limpieza del contador, headers de seguridad | 15 |
| `LoteTest.php` | Listado, creación, actualización, eliminación, validación de duplicados y campos requeridos | 7 |
| `MovimientoTest.php` | Creación de ingresos/salidas con actualización de saldo, reversión de saldo al eliminar, validaciones | 5 |
| `CarnetTest.php` | Creación de carnet, visualización con certificado, validación de campos | 4 |
| `CovidTest.php` | CRUD de lotes/movimientos/pedidos COVID, reportes COVID, validaciones | 15 |
| `ReporteTest.php` | Reportes PAI con validación de parámetros y rangos de fechas | 4 |
| `ExampleTest.php` | Respuesta exitosa de la aplicación | 2 |

---

## Estructura del proyecto

```
secsa-vacunacion/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── UsuarioController.php        # CRUD usuarios + reset password
│   │   │   │   └── ConfiguracionController.php  # Título y logo del portal
│   │   │   ├── Auth/
│   │   │   │   └── LoginController.php          # Autenticación por pasos + antibot
│   │   │   ├── DashboardController.php           # Dashboard con métricas y gráficas
│   │   │   ├── LoteController.php
│   │   │   ├── LoteCovidController.php
│   │   │   ├── MovimientoController.php
│   │   │   ├── MovimientoCovidController.php
│   │   │   ├── ReporteController.php
│   │   │   ├── ReporteCovidController.php
│   │   │   └── ...                              # Demás controladores PAI y COVID
│   │   └── Middleware/
│   │       ├── EsAdministrador.php              # Restricción de rutas /admin/* al rol Administrador
│   │       └── SecurityHeaders.php              # Headers HTTP de seguridad en todas las respuestas
│   ├── Models/
│   │   ├── User.php
│   │   ├── UsuarioOpcion.php
│   │   ├── Configuracion.php                    # Configuración del portal (fila única)
│   │   ├── Lote.php / LoteCovid.php
│   │   ├── Movimiento.php / MovimientoCovid.php
│   │   └── ...                                  # Demás modelos
│   └── Providers/
│       └── AppServiceProvider.php               # View Composer para portalConfig en el layout
├── database/
│   ├── migrations/                              # 11 migraciones
│   └── seeders/                                 # Usuarios, insumos, laboratorios, presentaciones, instituciones
├── resources/views/
│   ├── layouts/
│   │   ├── app.blade.php                        # Layout principal con sidebar dinámico y título/logo configurables
│   │   └── auth.blade.php                       # Layout de autenticación (login)
│   ├── admin/
│   │   ├── usuarios/                            # index.blade.php, create.blade.php, edit.blade.php
│   │   └── configuracion.blade.php
│   ├── auth/                                    # select-tipo.blade.php, login.blade.php
│   ├── dashboard.blade.php                      # Dashboard con Chart.js
│   ├── lotes/                                   # index, create, edit
│   ├── movimientos/
│   ├── reportes/
│   ├── covid/                                   # Vistas de todos los módulos COVID
│   └── ...
├── routes/
│   └── web.php                                  # Rutas auth, PAI, COVID, reportes y admin
└── tests/
    └── Feature/                                 # Suite de 52 pruebas Pest
```

---

## Licencia

Uso interno — Secretaría de Salud, Municipio de Envigado. Todos los derechos reservados.
