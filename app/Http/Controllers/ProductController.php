<?php

	namespace App\Http\Controllers;

	use App\Models\Product;
	use http\Client\Curl\User;

	class ProductController extends Controller
	{
		public function product()
		{
			$title = 'Products';
			$categoryId = request('category');
			$products = Product::with('category')
				->when($categoryId, function ($query, $categoryId) {
					return $query->where('category_id', $categoryId);
				})
				->when(!$categoryId, function ($query) {
					return $query->where('old_price', '!=', 0);
				})
				->cursorPaginate(4);

			return view('index', compact('title', 'products'));
		}

	}
