<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use App\Http\Requests\StoreProductRequest;

class AddProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:add {name} {desc} {price} {category_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add product to database from command line';

    /**
     * Execute the console command.
     * @throws BindingResolutionException
     */
    public function handle(): void
    {
        $request = new StoreProductRequest([
            'name' => $this->argument('name'),
            'description' => $this->argument('desc'),
            'price' => $this->argument('price'),
            'category_id' => $this->argument('category_id'),
        ]);

        $factory = app(Factory::class);
        $validator = $factory->make($request->all(), $request->rules());

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return;
        }

        $validatedData = $validator->validated();

        $product = new Product([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'image' => config('app.url') . '/images/default-image.jpg',
        ]);

        $product->save();
        $product->categories()->attach($validatedData['category_id']);
        $this->info('Product added successfully!');
    }
}
