<?php

namespace App\Services;

use App\Models\Product;
use App\Services\ProductCategoryService;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    private ProductRepository $productRepository;
    private ProductCategoryService $productCategoryService;

    public function __construct(ProductRepository $productRepository, ProductCategoryService $productCategoryService)
    {
        $this->productRepository = $productRepository;
        $this->productCategoryService = $productCategoryService;
    }

    public function getProducts(): Collection
    {
        return $this->productRepository->getProducts()->with('categories')->get();
    }

    public function addProduct(Product $product, int $category_id): Product
    {
        $createdProduct = $this->productRepository->addProduct($product);
        $this->productCategoryService->attachCategoryToProduct($createdProduct->id, $category_id);
        return $createdProduct;
    }
}
