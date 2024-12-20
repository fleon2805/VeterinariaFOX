<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Rutas principales
Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/contactos', [HomeController::class, 'contactos'])->name('contactos');

// Rutas de autenticación
Route::get('/usuarios/inicio-sesion', [UsuarioController::class, 'inicioSesion'])->name('usuarios.inicio_sesion');
Route::post('/usuarios/validar-sesion', [UsuarioController::class, 'validarSesion'])->name('usuarios.validar_sesion');
Route::get('/usuarios/registrar', [UsuarioController::class, 'registrar'])->name('usuarios.registrar');
Route::post('/usuarios/guardar-registro', [UsuarioController::class, 'guardarRegistro'])->name('usuarios.guardar_registro');

// Rutas de interfaces de usuario (necesitan autenticación)
Route::middleware('auth')->group(function () {
    Route::get('/usuarios/inicio-cliente', [UsuarioController::class, 'inicioCliente'])->name('usuarios.inicio_cliente');
    Route::get('/usuarios/inicio-empleado', [UsuarioController::class, 'inicioEmpleado'])->name('usuarios.inicio_empleado');

    // Ruta de logout
    Route::post('/usuarios/logout', function() {
        Auth::logout();
        return redirect()->route('usuarios.inicio_sesion');
    })->name('usuarios.logout');

    // Rutas específicas para empleados
    Route::prefix('empleado')->name('empleado.')->group(function () {
        Route::get('/', [EmpleadoController::class, 'index'])->name('index');
        Route::get('/inventario', [ProductoController::class, 'inventario'])->name('inventario');
        
        // Ruta para gestionar clientes dentro de empleado
        Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
        
        // Ruta para gestionar mascotas dentro de empleado
        Route::get('/mascotas', [MascotaController::class, 'index'])->name('mascotas.index');

        // Ruta para ver las mascotas de un cliente específico
        Route::get('/clientes/{cliente}/mascotas', [MascotaController::class, 'clienteMascotas'])->name('clientes.mascotas');
        
        // Rutas para el CRUD de mascotas de un cliente específico
        Route::get('/clientes/{cliente}/mascotas/create', [MascotaController::class, 'create'])->name('clientes.mascotas.create');
        Route::post('/clientes/{cliente}/mascotas', [MascotaController::class, 'store'])->name('clientes.mascotas.store');
        Route::get('/clientes/{cliente}/mascotas/{mascota}', [MascotaController::class, 'show'])->name('clientes.mascotas.show');
        Route::get('/clientes/{cliente}/mascotas/{mascota}/edit', [MascotaController::class, 'edit'])->name('clientes.mascotas.edit');
        Route::put('/clientes/{cliente}/mascotas/{mascota}', [MascotaController::class, 'update'])->name('clientes.mascotas.update');
        Route::delete('/clientes/{cliente}/mascotas/{mascota}', [MascotaController::class, 'destroy'])->name('clientes.mascotas.destroy');
    });

    // Rutas para cliente
    Route::get('/cliente/mascotas', [ClienteController::class, 'mascotas'])->name('cliente.mascotas');
    Route::get('/cliente/tienda', [ProductoController::class, 'tienda'])->name('cliente.tienda');

    // Rutas para configuración de cuenta del cliente
    Route::get('/cliente/configuracion', [ClienteController::class, 'configuracionCuenta'])->name('cliente.configuracion');
    Route::post('/cliente/configuracion', [ClienteController::class, 'actualizarCuenta'])->name('cliente.configuracion.update');
    
    // Rutas para el carrito de compras
    Route::get('/cliente/carrito', [CarritoController::class, 'index'])->name('cliente.carrito');
    Route::post('/cliente/carrito/{producto}/add', [CarritoController::class, 'add'])->name('cliente.carrito.add');
    Route::post('/cliente/carrito/{producto}/increment', [CarritoController::class, 'increment'])->name('cliente.carrito.increment');
    Route::post('/cliente/carrito/{producto}/decrement', [CarritoController::class, 'decrement'])->name('cliente.carrito.decrement');
    Route::post('/cliente/carrito/{producto}/remove', [CarritoController::class, 'remove'])->name('cliente.carrito.remove');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

        // Rutas CRUD para Empleados
        Route::get('empleados', [AdminController::class, 'indexEmpleados'])->name('admin.empleados.index');
        Route::get('empleados/create', [AdminController::class, 'createEmpleado'])->name('admin.empleados.create');
        Route::post('empleados', [AdminController::class, 'storeEmpleado'])->name('admin.empleados.store');
        Route::get('empleados/{id}', [AdminController::class, 'showEmpleado'])->name('admin.empleados.show');
        Route::get('empleados/{id}/edit', [AdminController::class, 'editEmpleado'])->name('admin.empleados.edit');
        Route::put('empleados/{id}', [AdminController::class, 'updateEmpleado'])->name('admin.empleados.update');
        Route::delete('empleados/{id}', [AdminController::class, 'destroyEmpleado'])->name('admin.empleados.destroy');
    });
});

// Rutas de recursos generales
Route::resource('productos', ProductoController::class);
Route::resource('clientes', ClienteController::class)->except(['index']); // El índice de clientes está gestionado por empleado
Route::resource('mascotas', MascotaController::class)->only(['index']);
Route::resource('empleado', EmpleadoController::class)->except(['index']); // El índice de empleados está gestionado en /empleado