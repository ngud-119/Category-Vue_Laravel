<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{

    public function getProducts() : Collection
    {
        return Product::with('categories')->get();
    }

    public function addProduct($product,  $category_id) : Product
    {

        $product = new Product([
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'image' => $product['image'],
        ]);
        
        $product->save();
        $product->categories()->attach($category_id);
        return $product;

    }

}

