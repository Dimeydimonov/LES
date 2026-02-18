<?php

	use App\Http\Controllers\AuthController;
	use App\Http\Controllers\CartController;
	use App\Http\Controllers\LanguageController;
	use App\Http\Controllers\HomeController;
	use App\Http\Controllers\ProductController;
	use Illuminate\Support\Facades\Route;

	Route::get('/', [HomeController::class, 'home'])->name('index');
	Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('guest')->group(function () {
	Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [HomeController::class, 'index'])->name('products');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'cartFromCart'])->name('cart');
Route::post('/cart/view', [CartController::class, 'viewFromCart'])->name('cart.view');
Route::get('/cart/view', [CartController::class, 'index'])->name('cart.view.get');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');