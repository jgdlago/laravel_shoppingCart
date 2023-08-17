<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('product')->group(function() {

    Route::get('/', [ProductController::class, 'getAllProducts'] )->name('product.all');

    Route::post('/', [ProductController::class, 'createProduct'] )->name('product.create');

});