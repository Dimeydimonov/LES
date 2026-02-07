<?php

	use App\Http\Controllers\AuthController;
	use App\Http\Controllers\LanguageController;
	use App\Http\Controllers\HomeController;
	use App\Http\Controllers\ProductController;
	use Illuminate\Support\Facades\Route;

	Route::get('/', [ProductController::class, 'home'])->name('index');
	Route::get('/home', [ProductController::class, 'home'])->name('home');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
