<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductRepository
{
    public function getProducts(): Builder
    {
        return Product::query();
    }

    public function getProductById(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function addProduct(Product $product): Product
    {
        $product->save();
        return $product;
    }
}
