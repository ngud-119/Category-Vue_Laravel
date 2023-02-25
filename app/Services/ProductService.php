<?php
namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts() : Collection
    {
        return $this->productRepository->getProducts()->with('categories')->get();
    }

    public function addProduct(Product $product, int $category_id) : Product
    {
    
        $createdProduct = $this->productRepository->addProduct($product);
        $createdProduct->categories()->attach($category_id); 
        return $createdProduct;
      
    }

}
