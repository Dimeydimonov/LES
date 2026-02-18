<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Response;

	class CartController extends Controller
	{
		public function cartFromCart(Request $request): JsonResponse | RedirectResponse | Response
		{
			$productId = $request->input('product_id');
			$cart = session('cart', []);
			
			// Remove item from cart
			$cart = array_filter($cart, function($item) use ($productId) {
				return $item['product_id'] != $productId;
			});
			
			session(['cart' => array_values($cart)]);
			
			// Check if request is AJAX
			if ($request->expectsJson()) {
				return response()->json([
					'success' => true,
					'message' => 'Item removed from cart',
					'cart_count' => count($cart)
				], 200, [], JSON_UNESCAPED_UNICODE);
			} else {
				// Non-JavaScript fallback - redirect back with success message
				return redirect()->back()->with('success', 'Товар удален из корзины!');
			}
		}
		
		public function addToCart(Request $request): JsonResponse | RedirectResponse | Response
		{
			$productId = $request->input('product_id');
			$productName = $request->input('product_name');
			$amount = $request->input('amount');
			$image = $request->input('image'); // Get image from request
			$oldPrice = $request->input('old_price'); // Get old price
			
			$cart = session('cart', []);
			
			// Check if product already exists in cart
			$existingItemIndex = null;
			foreach ($cart as $index => $item) {
				if ($item['product_id'] == $productId) {
					$existingItemIndex = $index;
					break;
				}
			}
			
			if ($existingItemIndex !== null) {
				// Update quantity if exists
				$cart[$existingItemIndex]['quantity']++;
			} else {
				// Add new item with image and old price
				$cart[] = [
					'product_id' => $productId,
					'name' => $productName,
					'price' => $amount,
					'old_price' => $oldPrice, // Store old price
					'image' => $image, // Store image URL
					'quantity' => 1
				];
			}
			
			session(['cart' => $cart]);
			
			// Check if request is AJAX
			if ($request->expectsJson()) {
				return response()->json([
					'success' => true,
					'message' => 'Товар добавлен в корзину!',
					'cart_count' => count($cart)
				], 200, [], JSON_UNESCAPED_UNICODE);
			} else {
				// Non-JavaScript fallback - redirect back with success message
				return redirect()->back()->with('success', 'Товар добавлен в корзину!');
			}
		}

		public function viewFromCart(Request $request): JsonResponse | Response
		{
			$cart = session('cart', []);
			$total = 0;
			
			$html = '';
			
			if (!empty($cart)) {
				$html .= '<div class="cart-items">';
				foreach ($cart as $item) {
					$itemTotal = $item['price'] * $item['quantity'];
					$total += $itemTotal;
					
					// Use stored image URL or fallback
					$imageUrl = isset($item['image']) ? $item['image'] : asset('images/1.jpg');
					
					// Build price display with old price if exists
					$priceDisplay = '$' . number_format($item['price'], 2);
					if (!empty($item['old_price']) && $item['old_price'] > $item['price']) {
						$priceDisplay = '<span class="cart-old-price">$' . number_format($item['old_price'], 2) . '</span> $' . number_format($item['price'], 2);
					}
					
					$html .= '
						<div class="cart-item">
							<div class="cart-item-image">
								<img src="' . $imageUrl . '" alt="' . htmlspecialchars($item['name']) . '" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
							</div>
							<div class="cart-item-info">
								<h5 class="cart-item-name">' . htmlspecialchars($item['name']) . '</h5>
								<div class="cart-item-details">
									<span class="cart-item-price">' . $priceDisplay . '</span>
									<span class="cart-item-quantity">× ' . $item['quantity'] . '</span>
								</div>
							</div>
							<div class="cart-item-actions">
								<span class="cart-item-total">$' . number_format($itemTotal, 2) . '</span>
								<button type="button" class="btn-remove-from-cart" data-product-id="' . $item['product_id'] . '">
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</div>
					';
				}
				$html .= '</div>';
				$html .= '
					<div class="cart-summary">
						<div class="cart-summary-row cart-total">
							<strong>Total:</strong>
							<strong>$' . number_format($total, 2) . '</strong>
						</div>
						<div class="cart-actions">
							<button class="btn btn-primary btn-block">Checkout</button>
						</div>
					</div>
				';
			} else {
				$html .= '
					<div class="cart-empty">
						<i class="fa fa-shopping-cart" style="font-size: 48px; color: #ddd; margin-bottom: 16px;"></i>
						<p>Your cart is empty</p>
						<button class="btn btn-outline-primary" onclick="closeCartModal()">Continue Shopping</button>
					</div>
				';
			}
			
			return response()->json([
				'success' => true,
				'html' => $html,
				'cart_count' => count($cart),
				'total' => $total
			], 200, [], JSON_UNESCAPED_UNICODE);
		}

		public function index(): \Illuminate\View\View
		{
			$cart = session('cart', []);
			$total = 0;
			
			foreach ($cart as $item) {
				$total += $item['price'] * $item['quantity'];
			}
			
			return view('cart.index', [
				'cartItems' => $cart,
				'total' => $total,
				'cart_count' => count($cart)
			]);
		}

		public function __invoke()
		{
			//
		}
	}
