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

    public function index()
    {
        $data = $this->productService->getProducts(request());
        $hotData = $this->productService->getHotProducts();

        return view('layouts.products.products', [
            'products' => $data['products'],
            'hotProducts' => $hotData['products'],
            'hotPagination' => $hotData['pagination']
        ]);
    }

    public function home(Request $request)
    {
        $data = $this->productService->getProducts($request);
        $hotData = $this->productService->getHotProducts();

        return view('home.index', [
            'title' => 'Products',
            'products' => $data['products'],
            'pagination' => $data['pagination'],
            'hotProducts' => $hotData['products'],
            'hotPagination' => $hotData['pagination']
        ]);
    }

    public function search(Request $request)
    {
        $title = 'Search Results';
        $data = $this->productService->searchProducts($request);

        return view('home.index', [
            'title' => $title,
            'products' => $data['products'],
            'pagination' => $data['pagination']
        ]);
    }
}
