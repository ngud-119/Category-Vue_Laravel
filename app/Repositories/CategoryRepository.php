<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function getCategories(): Collection
    {
        return Category::all();
    }

    public function attachProductToCategory($productId, $categoryId)
    {

        $product = Product::find($productId);
        $category = Category::find($categoryId);
        $product->categories()->attach($category);

    }
}