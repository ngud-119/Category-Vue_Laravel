<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductService
{
    /**
     * Get all products with their categories.
     *
     * @return Collection
     */
    public function getProducts(): Collection;

    /**
     * Add a new product with its category.
     *
     * @param Product $product
     * @param int $category_id
     * @return Product
     * @throws \Exception
     */
    public function addProduct(Product $product, int $category_id): Product;
}
