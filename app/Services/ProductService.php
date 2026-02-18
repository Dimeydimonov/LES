<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductService
{
    use PaginationTrait;
    
    private const DEFAULT_PER_PAGE = 4;
    private const SEARCH_PER_PAGE = 8;

    public function getProducts(Request $request): array
    {
        $categoryId = $request->get('category');
        $page = $request->get('page', 1);

        $query = $this->getProductQuery($categoryId);
        
        $result = $this->paginate($query, $page, self::DEFAULT_PER_PAGE, $request->url());
        
        return [
            'products' => $result['items'],
            'pagination' => $result['pagination']
        ];
    }

    public function searchProducts(Request $request): array
    {
        $query = $request->get('query');
        $page = $request->get('page', 1);

        if (empty($query)) {
            return [
                'products' => collect(),
                'pagination' => null
            ];
        }

        $productQuery = Product::where('title', 'like', "%{$query}%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('description', 'like', "%{$query}%");
            });

        $result = $this->paginate($productQuery, $page, self::SEARCH_PER_PAGE, $request->url());
        
        return [
            'products' => $result['items'],
            'pagination' => $result['pagination']
        ];
    }

    public function getHotProducts(): array
    {
        $query = Product::where('is_offer', true);
        $result = $this->paginate($query, 1, self::DEFAULT_PER_PAGE, request()->url());
        
        return [
            'products' => $result['items'],
            'pagination' => $result['pagination']
        ];
    }

    private function getProductQuery(?int $categoryId): Builder
    {
        return Product::with('category')
            ->when($categoryId, function ($query, $categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->when(!$categoryId, function ($query) {
                return $query->where('old_price', '!=', 0);
            });
    }
}
