<?php

use App\Events\SendNotificationUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\LoginControler;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeControler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginControler::class, 'create'])->name('login')->middleware('guest:admin');
Route::post('login', [LoginControler::class, 'store'])->name('login.store')->middleware('guest:admin');

Route::middleware('auth:admin')->group(function () {

    Route::get('logout', [LoginControler::class, 'logout'])->name('logout');

    Route::get('dashboard', [HomeControler::class, 'index'])->name('dashboard');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('pusher', function () {
    return view('pusher.index');
});

Route::get('test', function () {
    event(new SendNotificationUser());
});
