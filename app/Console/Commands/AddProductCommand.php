<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($this->arguments(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return;
        }
    
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
