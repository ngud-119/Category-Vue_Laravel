<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->getProducts();
    }

    public function store(StoreProductRequest $request)
    {     
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName(); 
            $path = $file->move(public_path('images'), $fileName); 

            $product = new Product([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => 'http://localhost:8000/images/'.$fileName
            ]);

            $category_id = $request->input('category_id');
            $product = $this->productRepository->addProduct($product, $category_id);

        }   

    }    

}
