<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
});


Route::group(['prefix' => 'user'], function () {
    Route::post('create', [UserController::class, 'create']);
});

// Route::group(["middleware" => ["jwt.verify"]], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::delete('logout', [AuthController::class, 'logout']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::post('create', [ProductController::class, 'create']);
        Route::get('all', [ProductController::class, 'all']);
    });

    Route::group(['prefix' => 'category'], function () {
        Route::post('create', [CategoryController::class, 'create']);
        Route::get('all', [CategoryController::class, 'all']);
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::post('create', [PaymentMethodController::class, 'create']);
        Route::get('all', [PaymentMethodController::class, 'all']);
    });

    Route::group(['prefix' => 'shipping'], function () {
        Route::post('create', [ShippingMethodController::class, 'create']);
        Route::get('all', [ShippingMethodController::class, 'all']);
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::post('create', [CustomerController::class, 'create']);
        Route::get('all', [CustomerController::class, 'all']);
    });

    Route::group(['prefix' => 'order'], function () {
        Route::post('create', [OrderController::class, 'create']);
        Route::get('all', [OrderController::class, 'all']);
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::post('create', [CartController::class, 'create']);
        Route::get('all', [CartController::class, 'all']);
    });
// });
