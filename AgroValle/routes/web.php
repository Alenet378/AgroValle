<?php

use Illuminate\Support\Facades\Route;

// Rutas públicas (solo invitados)
Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect()->route('login'));
    Route::get('/login', fn () => view('auth.login'))->name('login');
    // Route::post('/login', [AuthController::class, 'login']);
});

// Rutas protegidas (solo autenticados)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::resource('insumos', InsumoController::class);
    // Route::resource('proveedores', ProveedorController::class);
    // Route::resource('empleados', EmpleadoController::class);
});