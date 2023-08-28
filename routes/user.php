<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\User\Auth\UserController;
use App\Http\Controllers\Api\Company\Auth\CompanyController;

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

Route::middleware('set.lang')->prefix('users')->group(function () {

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('otp', [UserController::class, 'verifyOtp']);

    Route::middleware('auth:api')->group(function () {
        Route::post('verified', [UserController::class, 'verified']);
        Route::post('logout', [UserController::class, 'logout']);

        Route::middleware('verified.account')->group(function () {

            Route::get('show', [UserController::class, 'show']);
            Route::get('notifications', [UserController::class, 'notifications']);
            Route::put('update', [UserController::class, 'update']);
            Route::delete('delete', [UserController::class, 'destroy']);

            Route::get('posts', [PostController::class, 'index']);
            Route::get('posts/self', [PostController::class, 'self']);
            Route::get('posts/{post}', [PostController::class, 'show']);
            Route::post('posts', [PostController::class, 'store']);
            Route::put('posts/{post}', [PostController::class, 'update']);
            Route::delete('posts/{post}', [PostController::class, 'destroy']);

            Route::get('categorys', [CategoryController::class, 'index']);
            Route::get('categorys/{category}', [CategoryController::class, 'show']);

            Route::get('companys', [CompanyController::class, 'index']);
            Route::get('companys/top', [CompanyController::class, 'top']);
            Route::get('companys/{company}', [CompanyController::class, 'show']);
        });
    });
});
