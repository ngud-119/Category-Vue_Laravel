<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    
    public function getCategories(): Collection
    {

        return DB::table('categories')->get();
        
    }
    
}