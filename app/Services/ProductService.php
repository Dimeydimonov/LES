<?php

	namespace App\Services;

	use App\Models\Product;

	class ProductService
	{
		public function getProducts($categoryId)
		{
			return Product::with('category')
				->when($categoryId, function ($query, $categoryId) {
					return $query->where('category_id', $categoryId);
				})
				->when(!$categoryId, function ($query) {
					return $query->where('old_price', '!=', 0);
				})
				->cursorPaginate(4);
		}
	}
	//sdfdd///sd//