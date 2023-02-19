<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
