<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\VehiclesAdminController;

Route::get('/', function () {
    return view('auth/login');
});

// Middleware untuk otentikasi
Route::middleware(['auth'])->group(function () {

    // Routes khusus admin
    Route::middleware(['role:admin'])->group(function () {
        // Admin dapat mengelola user
        Route::get('/dashboardAdmin', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/users', UserController::class);
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::resource('/vehiclesAdmin', VehiclesAdminController::class);
        Route::get('/searchAdmin', [VehiclesAdminController::class, 'search'])->name('vehiclesAdmin.search');
        Route::get('vehiclesAdmin/export', [VehiclesAdminController::class, 'export'])->name('exportVehicleAdmin');
    });

    // Routes untuk admin dan user
    Route::middleware(['role:user'])->group(function () {
        // User dan admin dapat mengelola kendaraan
        Route::get('/dashboardUser', [DashboardUserController::class, 'index'])->name('dashboardUser');
        Route::resource('/vehicles', VehicleController::class);
        Route::get('/search', [VehicleController::class, 'search'])->name('vehicles.search');
        Route::get('vehicles/export', [VehicleController::class, 'export'])->name('exportVehicle');
    });


});

// Otentikasi default
Auth::routes();

// This route will redirect authenticated users to the home page after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
