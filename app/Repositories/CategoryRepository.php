<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository
{
    public function getCategories(): Collection
    {
        return Category::all();
    }
}
