<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getProducts(){
        return Product::with('categories')->get();
    }

    public function addProduct($data)
    {

        $product = new Product;
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->image = $data['image'];
        $product->save();
        return $product;

    }
}