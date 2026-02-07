<?php

	namespace App\Http\Controllers;

	use App\Models\Product;

	class HomeController extends Controller
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

		public function search()
		{
			$query = request('query');
			$title = 'Search Results';

			if($query) {
				$products = Product::where('title', 'like', "%{$query}%")
					->orWhereHas('category', function($q) use ($query) {
						$q->where('description', 'like', "%{$query}%");
					})
					->cursorPaginate(8);
			} else {
				$products = collect();
			}

			return view('index', compact('title', 'products'));
		}

	}
