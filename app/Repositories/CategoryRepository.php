<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    
    public function getCategories(){

        return DB::table('categories')->get();
        
    }
    
}