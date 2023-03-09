<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Services\Category\CategoryServiceImpl;
use App\Services\ProductCategoryService;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ProductServiceImpl implements ProductService
{
    protected const PRODUCT_ALREADY_EXISTS = 'Product already exists.';
    private ProductRepository $productRepositoryImpl;
    private CategoryServiceImpl $categoryServiceImpl;
    private ProductCategoryService $productCategoryService;

    public function __construct(
        ProductRepository $productRepositoryImpl,
        ProductCategoryService $productCategoryService,
        CategoryServiceImpl $categoryServiceImpl
    ) {
        $this->productRepositoryImpl = $productRepositoryImpl;
        $this->categoryServiceImpl = $categoryServiceImpl;
        $this->productCategoryService = $productCategoryService;
    }

    public function getProducts(): Collection
    {
        return $this->productRepositoryImpl->getProducts()->get();
    }

    public function getProductsByCategory($categoryId): Collection
    {
        return $this->categoryServiceImpl->getCategoryById($categoryId)->getAllProducts();
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
