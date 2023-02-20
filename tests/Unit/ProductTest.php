<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_add_product(){

        $data = [
            'name' => 'Product 1',
            'description' => 'This is a sample product.',
            'price' => 19.99,
            'image' => 'default-product.jpg'
        ];
    
        $response = $this->post('http://localhost:8000/api/products', $data);
        $response->assertStatus(200);

    }  
    
}
