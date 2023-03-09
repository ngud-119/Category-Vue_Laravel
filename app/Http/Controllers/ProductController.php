<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Services\ImageUploadService;
use App\Http\Requests\StoreProductRequest;
use App\Services\Product\ProductServiceImpl;

class ProductController extends Controller
{
    private const PRODUCT_CREATED_SUCCESSFULLY = 'Product created successfully';
    private const DEFAULT_IMAGE_URL = '/images/default-image.jpg';
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

    public function getProductsByCategory(int $categoryId): JsonResponse
    {
        $result = ['status' => 200];
        $products = $this->productServiceImpl->getProductsByCategory($categoryId);
        $result['products'] = $products;
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
            'message' => self::PRODUCT_CREATED_SUCCESSFULLY,
            'createdProduct' => $createdProduct
        ], 201);
    }

    protected function createProduct(storeProductRequest $request): Product
    {
        if ($request->hasFile('image')) {
            $path = ImageUploadService::uploadImage($request->file('image'));
            $image = $path;
        } else {
            $image = config('app.url') . self::DEFAULT_IMAGE_URL;
        }

        return new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $image,
        ]);
    }
}
