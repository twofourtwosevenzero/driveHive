<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Home route: publicly accessible vehicles listing
Route::get('/', [VehicleController::class, 'index'])->name('home');

// Vehicle routes accessible to everyone
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');

// Booking routes restricted to authenticated users
Route::middleware(['auth'])->group(function () {
    // Only authenticated users can book vehicles
    Route::post('/vehicles/{vehicle}/book', [BookingController::class, 'store'])->name('vehicles.book');

    // Show bookings and history
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{vehicle}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (accessible only to admin users)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Vehicle management for admin
    Route::resource('/vehicles', AdminVehicleController::class);

    // Booking management for admin
    Route::resource('/bookings', AdminBookingController::class);

    // User management for admin
    Route::resource('/users', AdminUserController::class);
});

// Authentication routes (generated by Laravel Breeze or other auth packages)
require __DIR__.'/auth.php';
