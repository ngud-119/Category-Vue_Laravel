<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepository
{
    public function getCategories(): Collection;
    public function getCategoryById(int $categoryId): Category;
}
