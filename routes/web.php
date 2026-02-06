<?php

	use App\Http\Controllers\AuthController;
	use App\Http\Controllers\LanguageController;
	use App\Http\Controllers\ProductController;
	use Illuminate\Support\Facades\Route;

	Route::get('/', [ProductController::class, 'product'])->name('index');
	Route::get('/home', [ProductController::class, 'product'])->name('home');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

