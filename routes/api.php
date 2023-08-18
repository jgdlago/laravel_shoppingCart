<?php

use App\Http\Controllers\Cart_ItemController;
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

Route::prefix('cart_item')->group(function() {

    Route::get('/', [Cart_ItemController::class, 'getAll'] )->name('cart_item.all');
    Route::post('/', [Cart_ItemController::class, 'createCart_Item'] )->name('cart_item.create');
    Route::put('/{id}', [Cart_ItemController::class, 'updateCart_Item'] )->name('cart_item.update');
    Route::delete('/{id}', [Cart_ItemController::class, 'deleteCart_Item'] )->name('cart_item.delete');

});