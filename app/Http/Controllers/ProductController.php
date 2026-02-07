<?php

	namespace App\Http\Controllers;

	use App\Models\Product;
	use App\Services\ProductService;
	use Illuminate\Http\Request;
	use Illuminate\Http\RedirectResponse;

	class ProductController extends Controller
	{
		public function index()
		{
			$products = Product::paginate(12);
			$hotProducts = Product::where('is_offer', true)->paginate(6);
			return view('layouts.products', compact('products', 'hotProducts'));
		}

		public function home(Request $request)
		{
			$data = app(ProductService::class)->getProducts($request);
			$hotProducts = Product::where('is_offer', true)->paginate(4);

			return view('index', [
				'title' => 'Products',
				'products' => $data['products'],
				'pagination' => $data['pagination'],
				'hotProducts' => $hotProducts
			]);
		}

		public function __invoke()
		{
			return view('layouts.product_card');
		}

		public function show($id)
		{
			$product = Product::findOrFail($id);
		$products = Product::all();
			return view('layouts.product_one_card', compact('product', 'products'));
		}

		public function addToCart(Request $request): RedirectResponse
		{
			$productId = $request->input('product_id');
			$productName = $request->input('product_name');
			$amount = $request->input('amount');
			
//			cart
			session() -> push('cart', [
				'product_id' => $productId,
				'name' => $productName,
				'price' => $amount,
				'quantity' => 1
			]);
			
			return redirect()->back()->with('success', 'Товар добавлен в корзину!');
		}
	}
