<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class ProductTest extends TestCase
{
    public function test_add_product(){

        $file = UploadedFile::fake()->image('test-image.jpg');

        $data = [
            'name' => 'Product 1',
            'description' => 'This is a sample product.',
            'price' => 19.99,
            'image' => $file,
            'category_id' => 1
        ];

        $response = $this->post('http://localhost:8000/api/products', $data);
        $response->assertStatus(200);
    }
}
