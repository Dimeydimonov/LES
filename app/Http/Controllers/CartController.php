<?php

	namespace App\Http\Controllers;

	use App\Services\CartService;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Response;
	use Illuminate\View\View;

	class CartController extends Controller
	{
		private CartService $cartService;

		public function __construct(CartService $cartService)
		{
			$this->cartService = $cartService;
		}
		/**
		 * Удалить товар из корзины
		 */
		public function removeFromCart(Request $request): JsonResponse | RedirectResponse
		{
			$validated = $request->validate([
				'product_id' => 'required|integer'
			]);

			$this->cartService->removeItem($validated['product_id']);

			if ($request->expectsJson()) {
				return response()->json([
					'success' => true,
					'message' => 'Товар удален из корзины',
					'cart_count' => $this->cartService->getItemCount()
				], 200, [], JSON_UNESCAPED_UNICODE);
			}

			return redirect()->back()->with('success', 'Товар удален из корзины!');
		}

		/**
		 * Добавить товар в корзину
		 */
		public function addToCart(Request $request): JsonResponse | RedirectResponse
		{
			$validated = $request->validate([
				'product_id' => 'required|integer',
				'product_name' => 'required|string|max:255',
				'amount' => 'required|numeric|min:0',
				'image' => 'nullable|string',
				'old_price' => 'nullable|numeric|min:0'
			]);

			$this->cartService->addItem($validated);

			if ($request->expectsJson()) {
				return response()->json([
					'success' => true,
					'message' => 'Товар добавлен в корзину!',
					'cart_count' => $this->cartService->getItemCount()
				], 200, [], JSON_UNESCAPED_UNICODE);
			}

			return redirect()->back()->with('success', 'Товар добавлен в корзину!');
		}

		/**
		 * Получить содержимое корзины (API)
		 */
		public function viewFromCart(Request $request): JsonResponse
		{
			$cart = $this->cartService->getCart();
			$total = $this->cartService->calculateTotal();

			$html = view('cart.modal-content', [
				'cart_items' => $cart,
				'total' => $total,
				'cart_count' => $this->cartService->getItemCount()
			])->render();

			return response()->json([
				'success' => true,
				'html' => $html,
				'cart_count' => $this->cartService->getItemCount(),
				'total' => $total,
				'cart_items' => $cart
			], 200, [], JSON_UNESCAPED_UNICODE);
		}

		/**
		 * Отобразить страницу корзины
		 */
		public function index(): View
		{
			$cart = $this->cartService->getCart();
			$total = $this->cartService->calculateTotal();

			return view('cart.index', [
				'cartItems' => $cart,
				'total' => $total,
				'cart_count' => $this->cartService->getItemCount()
			]);
		}

		/**
	 * Обновить количество товара в корзине
	 */
	public function updateQuantity(Request $request): JsonResponse | RedirectResponse
	{
		$validated = $request->validate([
			'product_id' => 'required|integer',
			'quantity' => 'required|integer|min:1'
		]);

		$this->cartService->updateQuantity($validated['product_id'], $validated['quantity']);

		if ($request->expectsJson()) {
			return response()->json([
				'success' => true,
				'message' => 'Количество товара обновлено',
				'cart_count' => $this->cartService->getItemCount(),
				'total' => $this->cartService->calculateTotal()
			], 200, [], JSON_UNESCAPED_UNICODE);
		}

		return redirect()->back()->with('success', 'Количество товара обновлено!');
	}

	/**
	 * Очистить корзину
	 */
	public function clear(Request $request): JsonResponse | RedirectResponse
	{
		$this->cartService->clear();

		if ($request->expectsJson()) {
			return response()->json([
				'success' => true,
				'message' => 'Корзина очищена',
				'cart_count' => 0,
				'total' => 0
			], 200, [], JSON_UNESCAPED_UNICODE);
		}

		return redirect()->back()->with('success', 'Корзина очищена!');
	}
}