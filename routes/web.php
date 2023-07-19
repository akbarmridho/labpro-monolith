<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/items/{id}', [\App\Http\Controllers\ItemController::class, 'view'])->name('item');
Route::get('/items/{id}/purchase', [\App\Http\Controllers\ItemController::class, 'purchaseView'])->name('item.purchase');

Route::middleware(['auth'])->group(function () {
    Route::post('/items/{id}/purchase', [\App\Http\Controllers\ItemController::class, 'purchase']);
    Route::get('/item-history', [\App\Http\Controllers\ItemHistoryController::class, 'index'])->name('history');
});
