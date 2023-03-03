<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryImpl;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    protected const PRODUCT_ALREADY_EXISTS = 'Product already exists.';
    private ProductRepositoryImpl $productRepositoryImpl;
    private ProductCategoryService $productCategoryService;

    public function __construct(
        ProductRepositoryImpl $productRepositoryImpl,
        ProductCategoryService $productCategoryService
    ) {
        $this->productRepositoryImpl = $productRepositoryImpl;
        $this->productCategoryService = $productCategoryService;
    }

    public function getProducts(): Collection
    {
        return $this->productRepositoryImpl->getProducts()
            ->with('categories')->get();
    }

    /**
     * @throws Exception
     */
    public function addProduct(Product $product, int $category_id): Product
    {
        $productFromDatabase = $this->productRepositoryImpl
            ->getProductByName($product->name);
        if ($productFromDatabase != null) {
            throw new Exception(self::PRODUCT_ALREADY_EXISTS);
        }
        $createdProduct = $this->productRepositoryImpl->addProduct($product);
        $this->productCategoryService
            ->attachCategoryToProduct($createdProduct->id, $category_id);
        return $createdProduct;
    }
}
