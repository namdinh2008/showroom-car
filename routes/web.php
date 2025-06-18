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
use App\Http\Controllers\CartController;

// --- Cổng public ---
Route::get('/', function () {
    return view('home');
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
        Route::resource('/accessories', \App\Http\Controllers\Admin\AccessoryController::class);

        // Quản lý đơn hàng phụ kiện
        Route::resource('/orders', OrderController::class);
    });

// Danh sách & chi tiết ô tô cho user/guest
Route::get('/cars', [CarModelController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarModelController::class, 'show'])->name('cars.show');

// Danh sách & chi tiết phụ kiện cho user/guest
Route::get('/accessories', [\App\Http\Controllers\AccessoryController::class, 'index'])->name('accessories.index');
Route::get('/accessories/{id}', [\App\Http\Controllers\AccessoryController::class, 'show'])->name('accessories.show');

// Đặt mua ô tô
Route::get('/cars/{id}/order', [\App\Http\Controllers\CarOrderController::class, 'create'])->name('cars.order');
Route::post('/cars/{id}/order', [\App\Http\Controllers\CarOrderController::class, 'store'])->name('cars.order.store');

// Giỏ hàng phụ kiện
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

// --- Auth (Login / Register / Forgot password...) ---
require __DIR__.'/auth.php';