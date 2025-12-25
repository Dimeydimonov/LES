<?php

	namespace App\Http\Controllers;

	use App\Models\Product;

	class ProductController extends Controller
	{
		public function product()
		{
			$title = 'Products';
			$products = Product::with('products')->get();
			return view('Product.Product', compact('title', 'products'));
		}
1

	}
