<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

const PRODUCT_PER_PAGE = 12;
Route::get('/', function () {
    $products = Product::with('category', 'brand')->paginate(PRODUCT_PER_PAGE);
    return view('welcome',compact('products'));
}) ->name('welcome') ;

Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');
Route::get('/api/products',[ProductController::class, 'getProductByPage'])->name('api.products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role.check')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/store', [ProductController::class, 'store'])->name('products.store');
            Route::put('/{id}/update', [ProductController::class, 'update'])->name('products.update');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');
            Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::put('/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });

        Route::prefix('brands')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('brands.index');
            Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
            Route::post('/store', [BrandController::class, 'store'])->name('brands.store');
            Route::put('/{id}/update', [BrandController::class, 'update'])->name('brands.update');
            Route::get('/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
            Route::delete('/{id}/delete', [BrandController::class, 'destroy'])->name('brands.destroy');
        });
    });
});
Route::get('/products/{slug}', [ProductController::class, 'getProductBySlug'])->name('client.products.show');
require __DIR__.'/auth.php';

