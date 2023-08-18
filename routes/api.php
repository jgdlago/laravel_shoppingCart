<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('product')->group(function() {

    Route::get('/', [ProductController::class, 'getAll'] )->name('product.all');
    Route::post('/', [ProductController::class, 'createProduct'] )->name('product.create');
    Route::put('/{id}', [ProductController::class, 'updateProduct'] )->name('product.update');
    Route::delete('/{id}', [ProductController::class, 'deleteProduct'] )->name('product.delete');

});

Route::prefix('cart')->group(function() {

    Route::get('/', [CartController::class, 'getAll'] )->name('cart.all');
    Route::post('/', [CartController::class, 'createCart'] )->name('cart.create');
    Route::put('/{id}', [CartController::class, 'updateCart'] )->name('cart.update');
    Route::delete('/{id}', [CartController::class, 'deleteCart'] )->name('cart.delete');

});