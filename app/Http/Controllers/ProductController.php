<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function __invoke()
    {
        return view('layouts.product.product_card');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productService = new ProductService();
        $hotProductsData = $productService->getHotProducts();
        $hotProducts = $hotProductsData['products'];
        return view('layouts.product.product_one_card', compact('product', 'hotProducts'));
    }
}