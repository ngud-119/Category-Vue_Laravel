<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductRepositoryImpl implements ProductRepository
{
    public function getProducts(): Builder
    {
        return Product::query();
    }

    public function getProductById(int $id): Product
    {
        return Product::findOrFail($id);
    }

    public function getProductByName(string $name): ?Product
    {
        $product = Product::where('name', $name)->first();

        if (!$product) {
            return null;
        }

        return $product;
    }

    public function addProduct(Product $product): Product
    {
        $product->save();
        return $product;
    }
}
