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
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
 

        
        public function store(StoreProductRequest $request)
        {
            try {

                $product = new Product([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price'),
                ]);
                $product->save();
                $category_id = $request->input('category_id');
                $product->categories()->attach($category_id);
                return $product;

            } catch (\Exception $e) {

                return back()->withInput()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
                
            }
        }
        
        
    
}
