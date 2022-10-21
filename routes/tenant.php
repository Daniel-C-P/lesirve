<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Tenant\ConfiguracioneController;
use App\Http\Controllers\Tenant\CuponeController;
use App\Http\Controllers\Tenant\MediosPagoController;
use App\Http\Controllers\Tenant\CarroCompraController;
use App\Http\Controllers\Tenant\CategoriaController;
use App\Http\Controllers\Tenant\DetalleVentaProductoController;
use App\Http\Controllers\Tenant\EtiquetaController;
use App\Http\Controllers\Tenant\EtiquetasProductoController;
use App\Http\Controllers\Tenant\ProductoController;
use App\Http\Controllers\Tenant\HorarioServicioController;
use App\Http\Controllers\Tenant\ReservaServicioController;
use App\Http\Controllers\Tenant\ServicioController;
use App\Http\Controllers\Tenant\UserController;
use App\Http\Controllers\Tenant\CompraController;
use App\Http\Controllers\Tenant\HomeTenantController;
use App\Http\Controllers\Tenant\Auth\LoginController;
use App\Http\Controllers\Tenant\Auth\RegisterController;
use App\Http\Controllers\Tenant\AdminAuth\LoginAdminController;
use App\Http\Controllers\Tenant\AdminAuth\HomeAdminController;
use App\Http\Controllers\Tenant\CategoriasMenuController;
use App\Http\Controllers\Tenant\ClienteController;
use App\Http\Controllers\Tenant\EstadosPagoController;
use App\Http\Controllers\Tenant\EstadosVentaController;
use App\Http\Controllers\Tenant\MenuController;
use App\Http\Controllers\Tenant\VentasProductoController;

Route::middleware([
  'web',
  InitializeTenancyByDomain::class,
  PreventAccessFromCentralDomains::class,
])->group(function () {
  Route::get('/', [HomeTenantController::class, 'index'])->name('tenant.cliente.home');
  Route::get('comprar/{id}', [ProductoController::class, 'vistaComprar'])->name('producto.comprar');
  Route::get('login', [LoginController::class, 'showLoginForm'])->name('tenant.show.login');
  Route::post('login', [LoginController::class, 'login'])->name('tenant.login');
  Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('tenant.show.register');
  Route::post('register', [RegisterController::class, 'register'])->name('tenant.register');
  Route::get('logout', [LoginController::class, 'logout'])->name('tenant.clientes.logout');
  Route::get('servicios', [ServicioController::class, 'listarServicios'])->name('tenant.servicios');
  Route::get('categorias/{id}', [CategoriaController::class, 'listarProductos']);
  Route::get('buscar', [ProductoController::class, 'buscarProductos']);
  Route::get('recuperar-cuenta', function () {
    return 'recuperar cuenta';
  })->name('recuperar-cuenta');

  Route::get('descuentos', [ProductoController::class, 'listarDescuentos'])->name('descuentos');
  Route::post('obtener-transacciones', [CompraController::class, 'obtenerTransacciones'])->name('tenant.compras.transacciones');

  Route::middleware('auth.tenant.cliente:cliente')
    ->group(function () {
      Route::post('realizar-comprar', [CompraController::class, 'realizarCompra'])->name('tenant.form.compra');
      Route::post('realizar-comprar-Medio', [CompraController::class, 'compraMedioPago'])->name('tenant.form.compra.medio');
      Route::post('finalizar-comprar', [CompraController::class, 'ordenar'])->name('tenant.comprar.ordenar');
      Route::get('mis-compras', [CompraController::class, 'misCompras'])->name('tenant.compras.cliente');
      Route::post('agregar-carrito', [CarroCompraController::class, 'store']);
      Route::post('editar-cantidad-producto', [CarroCompraController::class, 'update']);
      Route::put('actualizar-perfil', [ClienteController::class, 'actualizarPerfil'])->name('tenant.update-perfil');
      Route::get('reservar-servicio/{servicio}', [ReservaServicioController::class, 'vistaReservas'])->name('reservar.index');
      Route::get('servicios-solicitados', [ReservaServicioController::class, 'serviciosSolicitados'])->name('servicios-solicitados');
    });

  Route::prefix('admin')
    ->middleware('auth.tenant.admin')
    ->group(function () {
    //   Route::get('/', [HomeAdminController::class, 'index']);
      Route::get('home', [HomeAdminController::class, 'index'])
        ->name('tenant.admin.home');
      Route::resource('clientes', ClienteController::class)
        ->names('tenant.clientes');
      Route::get('/cambiar-contrasena/{id}', [UserController::class, 'mostrarFormCambiarPassword'])
        ->name('tenant.admin.users.form.cambiar-contrasena');
      Route::patch('/cambiar-contrasena/{user}', [UserController::class, 'cambiarPassword'])
        ->name('tenant.admin.users.cambiar-contrasena');
      Route::resource('users', UserController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
        ->names('tenant.admin.users');

      //Asignar roles a users
      Route::get('users/{user}', [UserController::class, 'show'])
        ->name('tenant.admin.asignar');
      Route::put('users/{user}', [UserController::class, 'updateRol']);

      //Configurar la tienda, panel de administracion
      Route::get('configuracion', [ConfiguracioneController::class, 'index'])
        ->name('tenant.admin.configuracion');
      Route::patch('configuracion', [ConfiguracioneController::class, 'update']);

      //Gestión de ventas (Cupones, medios pagos, estados, etc.)
      Route::resource('cupones', CuponeController::class);
      Route::resource('medios-pagos', MediosPagoController::class)->except(["update"]);
      Route::post('medios-pago', [MediosPagoController::class, 'update'])->name('medios-pagos.update');

      Route::patch('estados/pagos/{pago}', [EstadosPagoController::class, 'update'])->name('tenant.estados.pagos.update');
      Route::resource('estados/pagos', EstadosPagoController::class)
        ->names('tenant.estados.pagos');
      Route::patch('estados/ventas/{pago}', [EstadosVentaController::class, 'update'])->name('tenant.estados.ventas.update');
      Route::resource('estados/ventas', EstadosVentaController::class)
        ->names('tenant.estados.ventas');
      Route::resource('productos/ventas', VentasProductoController::class)
        ->names('tenant.productos.ventas');
      Route::resource('carro-compras', CarroCompraController::class);
      Route::resource('categorias', CategoriaController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
      Route::resource('detalle-venta-productos', DetalleVentaProductoController::class);
      Route::resource('etiquetas', EtiquetaController::class);
      Route::resource('etiquetas-productos', EtiquetasProductoController::class);
      Route::resource('productos', ProductoController::class);
      Route::resource('horario-servicios', HorarioServicioController::class);
      Route::resource('reserva-servicios', ReservaServicioController::class);
      Route::resource('servicios', ServicioController::class);
      Route::resource('menus', MenuController::class);
      Route::resource('submenus', CategoriasMenuController::class);

      // Login de usuario administrador
      Route::get('login', [LoginAdminController::class, 'showLoginForm'])
        ->withoutMiddleware('auth.tenant.admin')->name('login.tenant.admin');
      Route::post('login', [LoginAdminController::class, 'login'])
        ->withoutMiddleware('auth.tenant.admin');
      Route::get('logout', [LoginAdminController::class, 'logout'])
        ->name('logout.tenant.admin');
    });
});
