<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Product\ProductServiceImpl;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Services\ImageUploadService;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    protected ProductServiceImpl $productServiceImpl;

    public function __construct(ProductServiceImpl $productServiceImpl)
    {
        $this->productServiceImpl = $productServiceImpl;
    }

    public function index(): JsonResponse
    {
        $result = ['status' => 200];
        try {
            $result['products'] = $this->productServiceImpl->getProducts();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * @throws Exception
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->createProduct($request);
        $category_id = $request->input('category_id');
        $createdProduct = $this->productServiceImpl
            ->addProduct($product, $category_id);
        return response()->json([
            'message' => 'Product created successfully',
            'createdProduct' => $createdProduct
        ], 201);
    }

    protected function createProduct(storeProductRequest $request): Product
    {
        if ($request->hasFile('image')) {
            $path = ImageUploadService::uploadImage($request->file('image'));
            $image = $path;
        } else {
            $image = config('app.url') . '/images/default-image.jpg';
        }

        return new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $image,
        ]);
    }
}
