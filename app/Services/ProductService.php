<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    protected const PRODUCT_ALREADY_EXISTS = 'Product already exists.';
    private ProductRepository $productRepository;
    private ProductCategoryService $productCategoryService;

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryService $productCategoryService
    ) {
        $this->productRepository = $productRepository;
        $this->productCategoryService = $productCategoryService;
    }

    public function getProducts(): Collection
    {
        return $this->productRepository->getProducts()
            ->with('categories')->get();
    }

    /**
     * @throws Exception
     */
    public function addProduct(Product $product, int $category_id): Product
    {
        $productFromDatabase = $this->productRepository
            ->getProductByName($product->name);
        if ($productFromDatabase != null) {
            throw new Exception(self::PRODUCT_ALREADY_EXISTS);
        }
        $createdProduct = $this->productRepository->addProduct($product);
        $this->productCategoryService
            ->attachCategoryToProduct($createdProduct->id, $category_id);
        return $createdProduct;
    }
}
