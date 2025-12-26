<?php

	use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
	use App\Models\Category;

Route::get('/', function () { return view('index'); })->name('index');
Route::get('/home', function () { return view('index'); })->name('home');

Route::get('/lang/{locale}', [\App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

