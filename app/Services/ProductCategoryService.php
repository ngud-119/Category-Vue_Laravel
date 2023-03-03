<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryImpl;

class ProductCategoryService
{
    private ProductRepositoryImpl $productRepositoryImpl;

    public function __construct(ProductRepositoryImpl $productRepositoryImpl)
    {
        $this->productRepositoryImpl = $productRepositoryImpl;
    }

    public function attachCategoryToProduct(
        int $product_id,
        int $category_id
    ): void {
         $product = $this->productRepositoryImpl->getProductById($product_id);
         $product->categories()->attach($category_id);
    }
}
