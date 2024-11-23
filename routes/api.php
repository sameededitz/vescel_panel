<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');

    Route::post('/signup', [AuthController::class, 'signup'])->name('api.login');

    Route::post('/reset-password', [VerifyController::class, 'sendResetLink'])->name('api.reset.password');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

    Route::get('/cart', [ApiController::class, 'cart'])->name('api.cart');
    Route::post('/cart/add', [ApiController::class, 'addToCart'])->name('api.cart.add');
    Route::delete('/cart/remove', [ApiController::class, 'removeFromCart'])->name('api.cart.remove');

    Route::get('/orders', [ApiController::class, 'orders'])->name('api.orders');
    Route::post('/order/details', [ApiController::class, 'orderDetails'])->name('api.order.details');
    Route::post('/order/create', [ApiController::class, 'storeOrder'])->name('api.order');
});

Route::get('/categories', [ApiController::class, 'categories'])->name('api.categories');

Route::post('/products', [ApiController::class, 'products'])->name('api.products');

Route::post('/email/resend-verification', [VerifyController::class, 'resendVerify'])->name('api.verify.resend');
