<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class AddProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:add {name} {description} {price} {category_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add product to database from command line';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');
        $category_id = $this->argument('category_id');

        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->image = 'default.jpg';
        $product->save();
        $product->categories()->attach($category_id);

        $this->info('Product added successfully !!.');
    }
}
