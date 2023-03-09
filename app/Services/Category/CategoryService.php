<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryService
{
    /**
     * Get all categories.
     *
     * @return Collection
     */
    public function getCategories(): Collection;
    public function getCategoryById(int $categoryId): Category;
}
