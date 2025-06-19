<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::apiResource('cart', CartController::class)->only(['index', 'store', 'destroy']);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::post('products', [ProductController::class, 'store']);
});

Route::prefix('users')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

