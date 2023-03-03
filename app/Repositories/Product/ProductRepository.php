<?php

namespace App\Repositories\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

interface ProductRepository
{
    public function getProducts(): Builder;
    public function getProductById(int $id): Product;
    public function getProductByName(string $name): ?Product;
    public function addProduct(Product $product): Product;
}
