<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarOptionController;
use App\Http\Controllers\Admin\CarOrderController;
use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\Admin\OrderController;

// --- Cổng public ---
Route::get('/', function () {
    return view('welcome');
});

// Dashboard cho user
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- Cổng user cá nhân ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Cổng Admin ---
Route::middleware(['auth', IsAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Quản lý người dùng
        Route::resource('/users', UserController::class);

        // Quản lý mẫu xe (Car Models)
        Route::resource('/carmodels', CarModelController::class);

        // Quản lý tuỳ chọn cấu hình xe
        Route::resource('/car-options', CarOptionController::class);

        // Quản lý đơn đặt xe
        Route::resource('/car-orders', CarOrderController::class);

        // Quản lý phụ kiện
        Route::resource('/accessories', AccessoryController::class);

        // Quản lý đơn hàng phụ kiện
        Route::resource('/orders', OrderController::class);
    });

// --- Auth (Login / Register / Forgot password...) ---
require __DIR__.'/auth.php';