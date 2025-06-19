<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarConfigurationOptionController;
use App\Http\Controllers\Admin\CarOrderController;
use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\Admin\OrderController;

// --- Public ---
Route::get('/', function () {
    return view('welcome');
});

// --- Dashboard cho user ---
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- Profile cá nhân ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Admin routes thủ công ---
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Car Models
    Route::prefix('carmodels')->name('carmodels.')->group(function () {
        Route::get('/', [CarModelController::class, 'index'])->name('index');
        Route::get('/create', [CarModelController::class, 'create'])->name('create');
        Route::post('/store', [CarModelController::class, 'store'])->name('store');
        Route::get('/edit/{carmodel}', [CarModelController::class, 'edit'])->name('edit');
        Route::put('/update/{carmodel}', [CarModelController::class, 'update'])->name('update');
        Route::delete('/delete/{carmodel}', [CarModelController::class, 'destroy'])->name('destroy');
    });

    // Car Configuration Options
    Route::prefix('car-options')->name('caroptions.')->group(function () {
        Route::get('/', [CarConfigurationOptionController::class, 'index'])->name('index');
        Route::get('/create', [CarConfigurationOptionController::class, 'create'])->name('create');
        Route::post('/store', [CarConfigurationOptionController::class, 'store'])->name('store');
        Route::get('/edit/{caroption}', [CarConfigurationOptionController::class, 'edit'])->name('edit');
        Route::put('/update/{caroption}', [CarConfigurationOptionController::class, 'update'])->name('update');
        Route::delete('/delete/{caroption}', [CarConfigurationOptionController::class, 'destroy'])->name('destroy');
    });

    // Car Orders
    Route::prefix('car-orders')->name('carorders.')->group(function () {
        Route::get('/', [CarOrderController::class, 'index'])->name('index');
        Route::get('/create', [CarOrderController::class, 'create'])->name('create');
        Route::post('/store', [CarOrderController::class, 'store'])->name('store');
        Route::get('/edit/{carorder}', [CarOrderController::class, 'edit'])->name('edit');
        Route::put('/update/{carorder}', [CarOrderController::class, 'update'])->name('update');
        Route::delete('/delete/{carorder}', [CarOrderController::class, 'destroy'])->name('destroy');
    });

    // Accessories
    Route::prefix('accessories')->name('accessories.')->group(function () {
        Route::get('/', [AccessoryController::class, 'index'])->name('index');
        Route::get('/create', [AccessoryController::class, 'create'])->name('create');
        Route::post('/store', [AccessoryController::class, 'store'])->name('store');
        Route::get('/edit/{accessory}', [AccessoryController::class, 'edit'])->name('edit');
        Route::put('/update/{accessory}', [AccessoryController::class, 'update'])->name('update');
        Route::delete('/delete/{accessory}', [AccessoryController::class, 'destroy'])->name('destroy');
    });

    // Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::put('/update/{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('/delete/{order}', [OrderController::class, 'destroy'])->name('destroy');
    });
});

// --- Auth ---
require __DIR__.'/auth.php';