<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function product(Request $request)
    {
        $title = 'Products';
        $data = $this->productService->getProducts($request);
        
        $hotProducts = \App\Models\Product::where('is_offer', true)->paginate(6);

        return view('index', [
            'title' => $title,
            'products' => $data['products'],
            'pagination' => $data['pagination'],
            'hotProducts' => $hotProducts
        ]);
    }

    public function search(Request $request)
    {
        $title = 'Search Results';
        $data = $this->productService->searchProducts($request);

        return view('index', [
            'title' => $title,
            'products' => $data['products'],
            'pagination' => $data['pagination']
        ]);
    }
}
