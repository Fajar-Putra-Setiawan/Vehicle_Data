<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehiclesAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

// Middleware untuk otentikasi
Route::middleware(['auth'])->group(function () {

    // Routes khusus admin
    Route::middleware(['role:admin'])->group(function () {
        // Admin dapat mengelola user
        Route::resource('/users', UserController::class);
        Route::resource('/vehiclesAdmin', VehiclesAdminController::class);
        Route::get('/search', [VehiclesAdminController::class, 'search'])->name('vehiclesAdmin.search');
        Route::get('vehiclesAdmin/export', [VehiclesAdminController::class, 'export'])->name('exportVehicleAdmin');
    });

    // Routes untuk admin dan user
    Route::middleware(['role:user'])->group(function () {
        // User dan admin dapat mengelola kendaraan
        Route::resource('/vehicles', VehicleController::class);
        Route::get('/search', [VehicleController::class, 'search'])->name('vehicles.search');
        Route::get('vehicles/export', [VehicleController::class, 'export'])->name('exportVehicle');
    });
});

// Otentikasi default
Auth::routes();

// This route will redirect authenticated users to the home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
