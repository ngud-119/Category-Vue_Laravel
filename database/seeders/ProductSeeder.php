<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::create([
            'name' => 'Product 1',
            'description' => 'description 1',
            'price' => 33.45,
            'image' => 'http://localhost:8000/images/product-1.jpg'
        ]);
 
        $product1->categories()->attach(Category::where('name', 'clothing')->first());
 
        $product2 = Product::create([
            'name' => 'Product 2',
            'description' => 'description 2',
            'price' => 139.45,
            'image' => 'http://localhost:8000/images/product-2.jpg'
        ]);
 
        $product2->categories()->attach(Category::where('name', 'accessories')->first());
 
        $product3 = Product::create([
            'name' => 'Product 3',
            'description' => 'description 3',
            'price' => 55.45,
            'image' => 'http://localhost:8000/images/product-3.jpg'
        ]);
 
        $product3->categories()->attach(Category::where('name', 'sport')->first());
    }
}
