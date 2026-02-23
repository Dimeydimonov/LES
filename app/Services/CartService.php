<?php

	namespace App\Services;


//	Сессии
//session('key', 'value')    // Чтение/запись
//session()->forget('key')    // Удаление
//session()->flush()          // Очистка всех
	class CartService
	{
		public function getCart(): array
		{
			return session('cart', []);
		}
		private function saveCart(array $cart): void
		{
			session(['cart' => $cart]);
		}
		public function clear(): void
		{
			session()->forget('cart');
		}



		// Добавить товар в корзину

		public function addItem(array $product): void
		{
			$cart = $this->getCart();

			$existingItemIndex = $this->findItemIndex($cart, (int)$product['product_id']);

			if ($existingItemIndex !== null) {
				$cart[$existingItemIndex]['quantity']++;
			} else {
				$cart[] = [
					'product_id' => (int)$product['product_id'],
					'name' => $product['product_name'],
					'price' => $product['amount'],
					'old_price' => $product['old_price'] ?? null,
					'image' => $product['image'] ?? null,
					'quantity' => 1
				];
			}

			$this->saveCart($cart);
		}


		 //Удалить товар из корзины

		public function removeItem(int $productId): void
		{
			$cart = $this->getCart();
			
			$cart = array_filter($cart, function ($item) use ($productId) {
				// Приводим к int для сравнения
				$itemProductId = (int)$item['product_id'];
				return $itemProductId !== $productId;
			});

			$this->saveCart(array_values($cart));
		}


		 // Обновить количество товара

		public function updateQuantity(int $productId, int $quantity): void
		{
			$cart = $this->getCart();
			$index = $this->findItemIndex($cart, $productId);

			if ($index !== null) {
				if ($quantity <= 0) {
					$this->removeItem($productId);
				} else {
					$cart[$index]['quantity'] = $quantity;
					$this->saveCart($cart);
				}
			}
		}


		//Подсчитать общую стоимость

		public function calculateTotal(): float
		{
			$cart = $this->getCart();
			$total = 0;

			foreach ($cart as $item) {
				$total += $item['price'] * $item['quantity'];
			}

			return $total;
		}


		//Получить количество товаров в корзине

		public function getItemCount(): int
		{
			return count($this->getCart());
		}





		 // Найти индекс товара в корзине

		private function findItemIndex(array $cart, int $productId): ?int
		{
			foreach ($cart as $index => $item) {
				// Приводим к int для сравнения
				$itemProductId = (int)$item['product_id'];
				if ($itemProductId === $productId) {
					return $index;
				}
			}
			return null;
		}



	}