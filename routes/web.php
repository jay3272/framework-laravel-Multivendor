<?php

use App\Http\Controllers\Admin\VendorController as AdminVendorController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Vendor\DashboardController as VendorDashboardController;
use App\Http\Controllers\Vendor\ProductController as VendorProductController;
use App\Http\Controllers\Shop\ProductController as ShopProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Shop/Public Routes
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/products', [ShopProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ShopProductController::class, 'show'])->name('products.show');
});

// Authentication Routes (these would be defined by Laravel Breeze/Jetstream/Fortify)
// Route::middleware(['auth'])->group(function () { ... });

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('vendors', AdminVendorController::class);
    Route::resource('products', AdminProductController::class);
});

// Vendor Routes
Route::prefix('vendor')->name('vendor.')->middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', VendorProductController::class);
});
