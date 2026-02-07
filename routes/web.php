<?php

	use App\Http\Controllers\AuthController;
	use App\Http\Controllers\LanguageController;
	use App\Http\Controllers\HomeController;
	use App\Http\Controllers\ProductController;
	use Illuminate\Support\Facades\Route;

	Route::get('/', [HomeController::class, 'product'])->name('index');
	Route::get('/home', [HomeController::class, 'product'])->name('home');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


