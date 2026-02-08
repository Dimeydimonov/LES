<?php

	namespace App\Http\Controllers;

	use App\Models\Product;

	class ProductController extends Controller
	{
		public function __invoke()
		{
			return view('layouts.product');
		}

		public function show($id)
		{
			$product = Product::findOrFail($id);
			$products = Product::where('id', '!=', $id)->paginate(12);
			return view('layouts.product', compact('product', 'products'));
		}

		public function index()
		{
			$products = Product::paginate(18);
			return view('layouts.products', compact('products'));
		}

	}
