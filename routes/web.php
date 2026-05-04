<?php

	use App\Http\Controllers\auth\AuthController;
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
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products', [HomeController::class, 'index'])->name('products');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/view', [CartController::class, 'viewFromCart'])->name('cart.view');
Route::get('/cart/view', [CartController::class, 'index'])->name('cart.view.get');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');


