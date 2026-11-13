<?php

use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect()->route('login'));
    Route::get('/login', fn () => view('auth.login'))->name('login');
    // Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::post('/logout', fn () => redirect()->route('login'))->name('logout'); 

  
    Route::get('/insumos', fn () => 'Insumos')->name('insumos.index');
    Route::get('/proveedores', fn () => 'Proveedores')->name('proveedores.index');
    Route::get('/empleados', fn () => 'Empleados')->name('empleados.index');
});