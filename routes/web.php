<?php

	use App\Http\Controllers\AuthController;
	use App\Http\Controllers\LanguageController;
	use Illuminate\Support\Facades\Route;

	Route::get('/', function () { return view('index'); })->name('index');
Route::get('/home', function () { return view('index'); })->name('home');

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

