<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Company\Auth\CompanyController;
use App\Http\Controllers\Api\PaymentController;

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

Route::middleware('set.lang')->prefix('companys')->group(function () {

    Route::post('register', [CompanyController::class, 'register']);
    Route::post('login', [CompanyController::class, 'login']);
    Route::post('otp', [CompanyController::class, 'verifyOtp']);

    Route::middleware('auth:company')->group(function () {
        Route::post('verified', [CompanyController::class, 'verified']);
        Route::post('logout', [CompanyController::class, 'logout']);

        Route::middleware('verified.account')->group(function () {

            Route::get('categorys', [CategoryController::class, 'index']);
            Route::get('categorys/{category}', [CategoryController::class, 'show']);

            Route::get('self', [CompanyController::class, 'self']);
            Route::put('update', [CompanyController::class, 'update']);
            Route::delete('delete', [CompanyController::class, 'destroy']);

            Route::get('posts', [PostController::class, 'index']);

            Route::get('posts/offer', [OfferController::class, 'index']);
            Route::get('posts/offer/{offer}', [OfferController::class, 'show']);
            Route::post('posts/offer', [OfferController::class, 'store']);
            Route::put('posts/offer/update/{offer}', [OfferController::class, 'update']);
            Route::delete('posts/offer/destroy/{offer}', [OfferController::class, 'destroy']);

            Route::get('projects', [ProjectController::class, 'index']);
            Route::get('projects/self', [ProjectController::class, 'self']);
            Route::get('projects/{project}', [ProjectController::class, 'show']);
            Route::post('projects', [ProjectController::class, 'store']);
            Route::put('projects/{project}', [ProjectController::class, 'update']);
            Route::delete('projects/{project}', [ProjectController::class, 'destroy']);

            Route::get('payments', [PaymentController::class, 'show']);
            Route::post('payments', [PaymentController::class, 'store']);
        });
    });
});
