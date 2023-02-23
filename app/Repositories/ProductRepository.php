<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{

    public function getProducts()
    {
        return Product::with('categories')->get();
    }

    public function addProduct($product, $category_id)
    {

        $product = new Product([
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'image' => $product['image'],
        ]);

        $product->save();
        $product->categories()->attach($category_id);    
   
    }

}

