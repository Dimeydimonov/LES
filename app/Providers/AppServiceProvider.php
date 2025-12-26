<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;
	use Illuminate\Support\Facades\View; // Правильный импорт!
	use App\Models\Category;

	class AppServiceProvider extends ServiceProvider
	{
		/**
		 * Register any application services.
		 */
		public function register(): void
		{
			//
		}

		/**
		 * Bootstrap any application services.
		 */
		public function boot(): void
		{
			// Передаем категории в боковое меню
			View::composer('layouts.left_menu_sector', function ($view) {
				$view->with('categories', Category::whereNull('parent_id')->with('children')->get());
			});
		}
	}
