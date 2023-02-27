<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductCategoryService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function attachCategoryToProduct(
        int $product_id,
        int $category_id
    ): void {
         $product = $this->productRepository->getProductById($product_id);
         $product->categories()->attach($category_id);
    }
}
