<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{

    public function getProducts() : Collection
    {
        return Product::with('categories')->get();
    }

    public function addProduct(Product $product) : Product
    {

        $product->save();
        return $product;

    }

}

