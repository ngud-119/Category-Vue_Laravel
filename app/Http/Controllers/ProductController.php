<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;
use App\Services\ImageUploadService;
use Illuminate\Http\RedirectResponse;
use App\Repositories\ProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index() : Collection
    {
        return $this->productRepository->getProducts();
    }

    public function store(StoreProductRequest $request) : void
    {     
        if ($request->hasFile('image')) {
      
            $path = ImageUploadService::uploadImage($request->file('image'));

            $product = new Product([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $path
            ]);

        } else {

            $product = new Product([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => config('app.url').'/images/default-image.jpg'
            ]);
            
        }  

        $category_id = $request->input('category_id');
        $product = $this->productRepository->addProduct($product, $category_id);

    }    
    
}
