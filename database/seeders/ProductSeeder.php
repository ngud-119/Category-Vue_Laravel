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
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 33.45,
            'image' => 'http://localhost:8000/images/product-1.jpg'
        ]);
 
        $product1->categories()->attach(Category::where('name', 'clothing')->first());
 
        $product2 = Product::create([
            'name' => 'Product 2',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 139.45,
            'image' => 'http://localhost:8000/images/product-2.jpg'
        ]);
 
        $product2->categories()->attach(Category::where('name', 'accessories')->first());
 
        $product3 = Product::create([
            'name' => 'Product 3',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 55.45,
            'image' => 'http://localhost:8000/images/product-3.jpg'
        ]);
 
        $product3->categories()->attach(Category::where('name', 'sport')->first());

        $product4 = Product::create([
            'name' => 'Product 4',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'price' => 34.45,
            'image' => 'http://localhost:8000/images/product-4.jpg'
        ]);
 
        $product4->categories()->attach(Category::where('name', 'sport')->first());
    }
}
