<?PHP
namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
public function __construct(
private ProductService $productService
) {}

public function product()
{
$title = 'Products';
$categoryId = request('category');
$products = $this->productService->getProducts($categoryId);

return view('index', compact('title', 'products'));
}
}