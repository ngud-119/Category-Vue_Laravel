<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use App\Services\ImageUploadService;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index() : Collection
    {
        return $this->productService->getProducts();
    }

    public function store(StoreProductRequest $request): JsonResponse
    {   

        $product = $this->createProductFromRequest($request); 
        $category_id = $request->input('category_id');
        $createdProduct = $this->productService->addProduct($product, $category_id);
        return response()->json(['message' => 'Product created successfully', 'createdProduct' => $createdProduct], 201);

    }

    protected function createProductFromRequest(storeProductRequest $request): Product
    {

        if ($request->hasFile('image')) {
            $path = ImageUploadService::uploadImage($request->file('image'));
            $image = $path;
        } else {
            $image = config('app.url').'/images/default-image.jpg';
        }

        return new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $image,
        ]);

    }
    
}
