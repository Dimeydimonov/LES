<?php

	namespace App\Providers;

	use Illuminate\Support\ServiceProvider;
	use Illuminate\Support\Facades\View;
	use App\Services\CartService;

	class ViewServiceProvider extends ServiceProvider
	{
		/**
		 * Register services.
		 */
		public function register(): void
		{
			//
		}

		/**
		 * Bootstrap services.
		 */
		public function boot(): void
		{
			// Передаем данные корзины во все view
			View::composer('*', function ($view) {
				$cartService = app(CartService::class);

				$view->with([
					'cartCount' => $cartService->getItemCount(),
					'cartItems' => $cartService->getCart(),
					'cartTotal' => $cartService->calculateTotal()
				]);
			});
		}
	}