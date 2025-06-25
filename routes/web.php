<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarVariantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartItemController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AccessoryController;


// Public Controllers
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\CartController;

// --- Trang chủ ---
Route::get('/', [HomeController::class, 'index'])->name('home');

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

// Cart
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index'); // Xem giỏ hàng
    Route::post('/add', [CartController::class, 'add'])->name('add'); // Thêm vào giỏ
    Route::post('/update/{cartItem}', [CartController::class, 'update'])->name('update'); // Cập nhật số lượng
    Route::delete('/remove/{cartItem}', [CartController::class, 'remove'])->name('remove'); // Xóa khỏi giỏ
});

// --- Cart routes ---
Route::get('/cart/checkout', [CartController::class, 'showCheckoutForm'])->name('cart.checkout.form');
Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.checkout');

// --- Admin routes ---
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

    // Car Variants
    Route::prefix('carvariants')->name('carvariants.')->group(function () {
        Route::get('/', [CarVariantController::class, 'index'])->name('index');
        Route::get('/create', [CarVariantController::class, 'create'])->name('create');
        Route::post('/store', [CarVariantController::class, 'store'])->name('store');
        Route::get('/edit/{carvariant}', [CarVariantController::class, 'edit'])->name('edit');
        Route::put('/update/{carvariant}', [CarVariantController::class, 'update'])->name('update');
        Route::delete('/delete/{carvariant}', [CarVariantController::class, 'destroy'])->name('destroy');
    });

    // Accessories
    Route::prefix('admin/accessories')->name('admin.accessories.')->group(function () {
        Route::get('/', [AccessoryController::class, 'index'])->name('index');
        Route::get('/create', [AccessoryController::class, 'create'])->name('create');
        Route::post('/', [AccessoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AccessoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AccessoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [AccessoryController::class, 'destroy'])->name('destroy');
    });

    // Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('edit');
        Route::put('/update/{order}', [OrderController::class, 'update'])->name('update');
        Route::delete('/delete/{order}', [OrderController::class, 'destroy'])->name('destroy');
        Route::get('/{order}', [OrderController::class, 'show'])->name('show');
    });

    // Products
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');
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

    // Cart Items
    Route::prefix('cartitems')->name('cartitems.')->group(function () {
        Route::get('/', [CartItemController::class, 'index'])->name('index');
        Route::delete('/delete/{cartitem}', [CartItemController::class, 'destroy'])->name('destroy');
    });

    // Blogs
    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/edit/{blog}', [BlogController::class, 'edit'])->name('edit');
        Route::put('/update/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('destroy');
    });

    // Wishlists
    Route::prefix('wishlists')->name('wishlists.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::delete('/delete/{wishlist}', [WishlistController::class, 'destroy'])->name('destroy');
    });

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});

// Trang chi tiết model xe
Route::get('/car-models/{id}', [\App\Http\Controllers\User\CarModelController::class, 'show'])->name('car_models.show');

// --- Auth routes ---
require __DIR__ . '/auth.php';
