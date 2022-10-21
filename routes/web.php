<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Principal\HomeController;
use App\Http\Controllers\Principal\TenantController;
use App\Http\Controllers\Principal\ClienteController;
use App\Http\Controllers\Principal\Auth\LoginAdminController;
use App\Http\Controllers\Principal\PlantillaController;
use App\Http\Controllers\Principal\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::resource('tiendas', TenantController::class);
Route::get('comprar/{id_producto}', function($id_producto){
  return "id $id_producto";
});
Route::resource('clientes', ClienteController::class);

Route::resource('users', UserController::class)
        ->only(['index','create','store','edit','update','destroy'])
        ->names('principal.admin.users');
//asignar roles a usuarios
Route::get('users/{user}', [UserController::class, 'show'])->name('principal.admin.asignar');
Route::put('users/{user}', [UserController::class, 'updateRol']);

Route::get('/cambiar-contrasena/{id}', [UserController::class, 'mostrarFormCambiarPassword'])
    ->name('principal.admin.users.form.cambiar-contrasena');
Route::patch('/cambiar-contrasena/{user}', [UserController::class, 'cambiarPassword'])
    ->name('principal.admin.users.cambiar-contrasena');

Route::get('plantilla/{id}', [PlantillaController::class, 'show']);

Route::namespace('Auth')->group(function(){
    Route::get('login', [LoginAdminController::class, 'showLoginForm'])->name('login');;
    Route::post('login', [LoginAdminController::class, 'login']);
    Route::post('logout', [LoginAdminController::class, 'logout'])->name('logout');;
    /* Route::get('register', [RegisterController::class, 'showRegistrationForm']);
    Route::post('register', [RegisterController::class, 'register']); */
});

