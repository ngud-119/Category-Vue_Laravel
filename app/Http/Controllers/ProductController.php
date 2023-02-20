<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with('categories')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
 
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
    
            $product->save();
            $category_id = $request->input('category_id');
            $product->categories()->attach($category_id);
            return $product;  

        }
        
    }     
    
}
